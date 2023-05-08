<?php

namespace Modules\Invoice\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Category;
use App\Models\Job;
use App\Models\Billing;
use App\Models\Party;
use App\Models\Service;
use App\Models\JobExecution;
use App\Models\InvoiceDetail;
use App\Models\ProformaInvoice;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InvoiceExport;
use App\Exports\ItemExport;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Mail;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $status = $request->status;
        $with_proforma = $request->with_proforma;
        $invoice_date = $request->invoice_date;
        $billing = $request->billing;
        $party = $request->party;

        $data = Invoice::with('party','billing')
        ->when($keyword, function ($query, $keyword) {
            return $query->where('invoice_number', 'LIKE', '%' . $keyword . '%');
        })
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);

        })->when($with_proforma, function ($query, $with_proforma) {
            $cond = ($with_proforma==1) ? '>' : '=' ;
            return $query->where('proforma_id', $cond, 0);

        })->when($invoice_date, function ($query,$invoice_date) {
                    
                $invoice_date = explode("-",$invoice_date);
                $startDate = date('Y-m-d', strtotime($invoice_date[0]));
                $endDate = date('Y-m-d', strtotime($invoice_date[1]));
            return $query->whereBetween('invoice_date', [$startDate, $endDate]);


        })->when($billing, function ($query,$billing) {
            return $query->where('billing_id', $billing);
        })->when($party, function ($query,$party) {
            return $query->where('party_id', $party);
        })->orderBy('id','DESC')->paginate(10);
        $billing = Billing::select('id','company_name')->where('status',1)->get();
        $parties = Party::select('id','name')->where('status',1)->get();

         return view('invoice::index',compact('data','billing','parties'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
  
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $performa_id = !empty($request->performa_id) ? $request->performa_id : '';
        $proforma = ProformaInvoice::with('items')->where('id',$performa_id)->first();
        $categories = Category::select('id','name')->where('status',1)->get();
        $jobs = Job::select('id','name')->where(function ($query) {
            $query
                  ->where('is_used', '=', 0)
                  ->orWhere('is_used', '=', 2);
                })->get();
        if($proforma){
        $billing = Billing::select('id','company_name')->where(['status'=>1,'id'=>$proforma->billing_id])->get();
        $parties = Party::select('id','name')->where(['status'=>1,'id'=>$proforma->party_id])->get();
        }
        else{
        $billing = Billing::select('id','company_name')->where('status',1)->get();
        $parties = Party::select('id','name')->where('status',1)->get();
        }
        $job_exe = JobExecution::select('id','name')->where('status',1)->get();
        $proformas = ProformaInvoice::with('party')->select('id','invoice_number','party_id')->where('status','=',1)->get();
        return view('invoice::create',compact('categories','jobs','billing','parties','job_exe','proformas','proforma'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'invoice_date' => 'required',
            'billing_id' => 'required',
            'party_id' => 'required',
        ]);
        $input = $request->all();
        $count = Invoice::where('billing_id','=',$input['billing_id'])->count();
        if($count==0)
        {
           $order_no = sprintf("%04d", 1);
        }
        else
        {
            if($count<10)
            {
                $order_no = sprintf("%03d", 0).($count+1);

            }
            else if($count>=10 && $count<99)
            {
                $order_no = sprintf("%02d", 0).($count+1);

            }
            else if($count>99 && $count<999)
            {
                $order_no = sprintf("%01d", 0).($count+1);

            }
            else if($count>999)
            {
                $order_no = ($count+1);

            }
            
        }
        $prefix = Billing::where('id',$request->billing_id)->value('preffix');
        unset($input['address']);
        $input['proforma_id'] = isset($input['proforma_id']) ? $input['proforma_id'] : 0;
        $input['expense'] = isset($input['expense']) ? $input['expense'] : 0;
        $input['invoice_date'] = date('Y-m-d', strtotime($request->invoice_date));
        $input['invoice_number'] = $prefix.'/'.$order_no.'/'.$this->financialYear();
        $invoice = Invoice::create($input);
        $total=0;
        $total_sgst=0;
        $total_cgst=0;
        $subTotal = 0;
        if(!empty($request->invoice))
        {
            // dd($request->invoice);
            $jobIds=array();
            foreach($request->invoice as $add)
            {
                
                if(!empty($add['job_id']))
                {
                if (!in_array($add['job_id'], $jobIds)) {
                $add['invoice_id'] = $invoice->id;
                $add['from'] = date('Y-m-d', strtotime($add['from']));
                $add['to'] = date('Y-m-d', strtotime($add['to']));
                $add['job_exe_id'] = !empty($add['job_exe_id']) ? json_encode($add['job_exe_id']) : NULL;
                InvoiceDetail::create($add);
                $gst  = $add['gst'];
                $rate  = $add['rate'];
                $total_gst = $this->percentage($gst,$rate);
                $total += ($rate)+($total_gst);
                $subTotal += ($rate);
                $total_sgst +=$total_gst/2;
                $total_cgst +=$total_gst/2;
                $job = Job::find($add['job_id']);
                $job->is_used = 1;
                $job->save();
                array_push($jobIds,$add['job_id']);
                    }
                }
            }
        }
        $inv = Invoice::find($invoice->id);
        $inv->total_cgst = $total_cgst;
        $inv->total_sgst = $total_sgst;
        $inv->subtotal = $subTotal;
        $inv->total = $total;
        $inv->save();
        
        $invoice = Invoice::with('billing.country','billing.state','billing.city','party.party_country','party.party_state','party.party_city','items.service')->find($invoice->id);
        //mail to party
        if($invoice->party->email){
        Mail::send('mail.invoice-mail', ['invoice' => $invoice], function($message) use($invoice){
            $message->to($invoice->party->email);
            $message->from("caservice.invoices@outlook.com");
            $message->subject('New Invoice');
        });
    }
        return redirect()->route('invoice.index')
        ->with('success','Invoice created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('invoice::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $invoice = Invoice::with('items')->find($id);
        $categories = Category::select('id','name')->where('status',1)->get();
        $jobs = Job::select('id','name')->where(function ($query) {
            $query->
                  where('is_used', '=', 0)
                  ->orWhere('is_used', '=', 2);
                })->get();
        $billing = Billing::select('id','company_name')->where('status',1)->get();
        $parties = Party::select('id','name')->where('status',1)->get();
        $job_exe = JobExecution::select('id','name')->where('status',1)->get();
        return view('invoice::edit',compact('categories','jobs','billing','parties','job_exe','invoice'));
    }

   
    public function update(Request $request, $id)
    {
        //
        
        $invoice = Invoice::find($id);
        $input = $request->all();
        $request->except('_method', '_token');
        unset($input['_token']);
        unset($input['_method']);
        unset($input['invoice']);
        // $input['status'] = isset($input['status']) ? 1 : 0;
        $input['expense'] = isset($input['expense']) ? $input['expense'] : 0;
        $input['invoice_date'] = date('Y-m-d', strtotime($request->invoice_date));
        $total=0;
        $total_sgst=0;
        $total_cgst=0;
        $subTotal = 0;
        if(!empty($request->invoice))
        {
            foreach($request->invoice as $k=>$add)
            {
                $inv = InvoiceDetail::find($k);
                $add['from'] = date('Y-m-d', strtotime($add['from']));
                $add['to'] = date('Y-m-d', strtotime($add['to']));
                $add['category_id'] = (integer)$add['category_id'] ? $add['category_id'] : $inv->category_id;
                $add['service_id'] = (integer)$add['service_id'] ? $add['service_id'] : $inv->service_id;
                $inv->update($add);
                $gst  = $add['gst'];
                $rate  = $add['rate'];
                $total_gst = $this->percentage($gst,$rate);
                $total += ($rate)+($total_gst);
                $subTotal += ($rate);
                $total_sgst +=$total_gst/2;
                $total_cgst +=$total_gst/2;
               
            }
        }
        $input['total_cgst'] = $total_cgst;
        $input['total_sgst'] = $total_sgst;
        $input['subtotal'] = $subTotal;
        $input['total'] = $total;
        $invoice->update($input);
        return redirect()->route('invoice.index')
        ->with('success','Invoice update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);

        if($invoice)
        {
            $invoice->status = 2;
            $invoice->save();
            //$invoice->delete();
            //$invoice->items()->delete();
            return redirect()->route('invoice.index')->with('success','invoice deleted successfully');
        }
    }

    public function getBilling(Request $request)
    {
        $billing = Billing::with('country','state','city')->where('id',$request->billing_id)->first();
        return response()->json($billing);

    }
    
    public function getParty(Request $request)
    {
        $party = Party::with('party_country','party_state','party_city')->where('id',$request->party_id)->first();
        return response()->json($party);

    }
    
    public function getService(Request $request)
    {
        $party = Service::where('category_id',$request->cid)->select('name','id')->get();
        return response()->json($party);

    } 
    
    public function serviceDetail(Request $request)
    {
        $bid = $request->bid;
        $service = Service::where('id',$request->service_id)->first();
        $service->gst = ($bid==2 || $bid==3 || $bid==9 || $bid==10) ? $service->gst : 0 ;
        return response()->json($service);

    }

    public function download($id)
    {
        $invoice = Invoice::with('billing.country','billing.state','billing.city','party.party_country','party.party_state','party.party_city','items.service')->find($id);
        #dd($invoice);
        $returnHTML = view('invoiceview')->with('invoice', $invoice)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
       
    }
    private function percentage($percent, $total) {
        return round((($percent/ 100) * $total),2);
    } 

    private function financialYear()
    {
        $year = date('Y');

    $month = date('m');

    if($month<4){

        $year = $year-1;

    }

    $start_date = date('y',strtotime(($year).'-04-01'));

    $end_date = date('y',strtotime(($year+1).'-03-31'));

    $response = $start_date.'-'.$end_date;

    return $response;
    }

    public function changeStatus(Request $request)
    {
            $id = $request->id;
            $invoice = ($request->model=='ProformaInvoice') ? ProformaInvoice::find($id) : Invoice::find($id);
            $invoice->status = $request->status;
            if($invoice->save())
            {
                return response()->json(array('success' => true));

            }
            else
            {
                return response()->json(array('success' => false));

            }
    }

    //export

    public function downloadExcel(Request $request)
    {
      
        $keyword = $request->keyword;
        $status = $request->status;
        $with_proforma = $request->with_proforma;
        $invoice_date = $request->invoice_date;
        $billing = $request->billing;
        $party = $request->party;
        $where = [];
        if($keyword)
        {
            $where[] = ['name', 'like', '%' . $keyword . '%']; 
        }
        if($status)
        {
            $where[] = ['status', '=', $status]; 
        }
        if($with_proforma)
        {
            $cond = ($with_proforma==1) ? '>' : '=';
            $where[] = ['proforma_id', $cond, 0]; 
        }
        if($invoice_date)
        {
            $invoice_date = explode("-",$invoice_date);
            $startDate = date('Y-m-d', strtotime($invoice_date[0]));
            $endDate = date('Y-m-d', strtotime($invoice_date[1]));
            $where[] = ['invoice_date','>=', $startDate]; 
            $where[] = ['invoice_date','<=', $endDate]; 
             
        }
        if($billing)
        {
            $where[] = ['billing_id', '=', $billing]; 
        }
        if($party)
        {
            $where[] = ['party_id', '=', $party]; 
        }
        return Excel::download(new InvoiceExport($where), 'invoice.xlsx');

    }


    public function invoiceItem(Request $request)
    {
        $keyword = $request->keyword;
        $status = $request->status;
        $with_proforma = $request->with_proforma;
        $invoice_date = $request->invoice_date;

        $data = Invoice::with('party','billing')
        ->when($keyword, function ($query, $keyword) {
            return $query->where('invoice_number', 'LIKE', '%' . $keyword . '%');
        })
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);

        })->when($with_proforma, function ($query, $with_proforma) {
            $cond = ($with_proforma==1) ? '>' : '=' ;
            return $query->where('proforma_id', $cond, 0);

        })->when($invoice_date, function ($query,$invoice_date) {
                    
                $invoice_date = explode("-",$invoice_date);
                $startDate = date('Y-m-d', strtotime($invoice_date[0]));
                $endDate = date('Y-m-d', strtotime($invoice_date[1]));
            return $query->whereBetween('invoice_date', [$startDate, $endDate]);


        })->orderBy('id','DESC')->paginate(10);
         return view('invoice::invoice-item',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10); 
    }


    public function itemDownload(Request $request)
    {

        $keyword = $request->keyword;
        $status = $request->status;
        $with_proforma = $request->with_proforma;
        $invoice_date = $request->invoice_date;
        $where = [];
        if($keyword)
        {
            $where[] = ['name', 'like', '%' . $keyword . '%']; 
        }
        if($status)
        {
            $where[] = ['status', '=', $status]; 
        }
        if($with_proforma)
        {
            $cond = ($with_proforma==1) ? '>' : '=';
            $where[] = ['proforma_id', $cond, 0]; 
        }
        if($invoice_date)
        {
            $invoice_date = explode("-",$invoice_date);
            $startDate = date('Y-m-d', strtotime($invoice_date[0]));
            $endDate = date('Y-m-d', strtotime($invoice_date[1]));
            $where[] = ['invoice_date','>=', $startDate]; 
            $where[] = ['invoice_date','<=', $endDate]; 
             
        }
    


    return Excel::download(new ItemExport($where), 'items.xlsx');

    }
}
