<?php

namespace Modules\ProformaInvoice\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\ProformaInvoice;
use App\Models\Category;
use App\Models\Job;
use App\Models\Billing;
use App\Models\Party;
use App\Models\Service;
use App\Models\JobExecution;
use App\Models\ProformaInvoiceDetail;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PerformaExport;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class ProformaInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        
        $keyword = $request->keyword;
        $status = $request->status;
        $billing = $request->billing;
        $party = $request->party;
        $data = ProformaInvoice::with('party','billing')
        ->when($keyword, function ($query, $keyword) {
            return $query->where('invoice_number', 'LIKE', '%' . $keyword . '%');
        })
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);

        })
        ->when($billing, function ($query,$billing) {
            return $query->where('billing_id', $billing);
        })->when($party, function ($query,$party) {
            return $query->where('party_id', $party);
        })
        ->orderBy('id','DESC')->paginate(10);
        $billing = Billing::select('id','company_name')->where('status',1)->get();
        $parties = Party::select('id','name')->where('status',1)->get();

         return view('proformainvoice::index',compact('data','billing','parties'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
  
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::select('id','name')->where('status',1)->get();
        $jobs = Job::select('id','name')->where(function ($query) {
            $query->where('status', '=', 1)
                  ->where('is_used1', '=', 0)
                  ->orWhere('is_used', '=', 2);
                })->get();

        $billing = Billing::select('id','company_name')->where('status',1)->get();
        $parties = Party::select('id','name')->where('status',1)->get();
        $job_exe = JobExecution::select('id','name')->where('status',1)->get();
        return view('proformainvoice::create',compact('categories','jobs','billing','parties','job_exe'));
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
        
        $count = ProformaInvoice::where('billing_id','=',$input['billing_id'])->count();
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
        $prefix = Billing::where('id',$request->billing_id)->value('preffix');
        unset($input['address']);
        $input['invoice_date'] = date('Y-m-d', strtotime($request->invoice_date));
        $input['invoice_number'] = 'PI/'.$prefix.'/'.$order_no.'/'.$this->financialYear();

        $proformainvoice = ProformaInvoice::create($input);
        $total=0;
        $total_sgst=0;
        $total_cgst=0;
        $subTotal = 0;
        if(!empty($request->invoice))
        {
            $jobIds=array();

            foreach($request->invoice as $add)
            {
                if(isset($add['category_id']) && !empty($add['category_id']))
                {
                if (!in_array($add['job_id'], $jobIds)) {
                $add['invoice_id'] = $proformainvoice->id;
                $add['from'] = date('Y-m-d', strtotime($add['from']));
                $add['to'] = date('Y-m-d', strtotime($add['to']));
                ProformaInvoiceDetail::create($add);
                $gst  = $add['gst'];
                $rate  = $add['rate'];
                $total_gst = $this->percentage($gst,$rate);
                $total += ($rate)+($total_gst);
                $subTotal += ($rate);
                $total_sgst +=$total_gst/2;
                $total_cgst +=$total_gst/2;
                array_push($jobIds,$add['job_id']);
                }
                
            }
        }
        }
        $inv = ProformaInvoice::find($proformainvoice->id);
        $inv->total_cgst = $total_cgst;
        $inv->total_sgst = $total_sgst;
        $inv->subtotal = $subTotal;
        $inv->total = $total;
        $inv->save();
        $invoice = ProformaInvoice::with('billing.country','billing.state','billing.city','party.party_country','party.party_state','party.party_city','items.service')->find($proformainvoice->id);
        if($invoice->party->email){
        //mail to party
        Mail::send('mail.performa-invoice', ['invoice' => $invoice], function($message) use($invoice){
            $message->to($invoice->party->email);
            $message->from("caservice.invoices@outlook.com");
            $message->subject('New Invoice');
        });
    }
        return redirect()->route('proforma-invoice.index')
        ->with('success','ProformaInvoice created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('proformainvoice::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $proformainvoice = ProformaInvoice::with('items')->find($id);
        $categories = Category::select('id','name')->where('status',1)->get();
        $jobs = Job::select('id','name')->where(function ($query) {
            $query->where('status', '=', 1)
                  ->where('is_used', '=', 0)
                  ->orWhere('is_used', '=', 2);
                })->get();
        $billing = Billing::select('id','company_name')->where('status',1)->get();
        $parties = Party::select('id','name')->where('status',1)->get();
        $job_exe = JobExecution::select('id','name')->where('status',1)->get();
        return view('proformainvoice::edit',compact('categories','jobs','billing','parties','job_exe','proformainvoice'));
    }

   
    public function update(Request $request, $id)
    {
        //
        
        $proformainvoice = ProformaInvoice::find($id);
        $input = $request->all();
        $request->except('_method', '_token');
        unset($input['_token']);
        unset($input['_method']);
        unset($input['invoice']);
        $input['invoice_date'] = date('Y-m-d', strtotime($request->invoice_date));
        $total=0;
        $total_sgst=0;
        $total_cgst=0;
        $subTotal = 0;
        if(!empty($request->invoice))
        {
            foreach($request->invoice as $k=>$add)
            {
                $inv = ProformaInvoiceDetail::find($k);
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
        $proformainvoice->update($input);
        return redirect()->route('proforma-invoice.index')
        ->with('success','Invoice update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $proformainvoice = ProformaInvoice::find($id);

        if($proformainvoice)
        {
            $proformainvoice->status = 2;
            $proformainvoice->save();
            return redirect()->route('proforma-invoice.index')->with('success','proformainvoice deleted successfully');
        }
    }

        private function percentage($percent, $total) {
        return round((($percent/ 100) * $total),2);
    } 
    public function download($id)
    {
        $invoice = ProformaInvoice::with('billing.country','billing.state','billing.city','party.party_country','party.party_state','party.party_city','items.service')->find($id);
        $returnHTML = view('proformainvoiceview')->with('invoice', $invoice)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
       
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

    //export

    public function downloadExcel(Request $request)
    {
      
        $keyword = $request->keyword;
        $status = $request->status;
        $with_proforma = $request->with_proforma;
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
        if($billing)
        {
            $where[] = ['billing_id', '=', $billing]; 
        }
        if($party)
        {
            $where[] = ['party_id', '=', $party]; 
        }
        return Excel::download(new PerformaExport($where), 'invoice.xlsx');

}
}