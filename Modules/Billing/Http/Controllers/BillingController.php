<?php

namespace Modules\Billing\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Billing;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;
use DateTime;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Billing::orderBy('id','DESC')->paginate(10);
         return view('billing::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
  
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    { 
        $order = Billing::latest()->first();
        if(empty($order))
        {
           $order_no = sprintf("%04d", 1);
        }
        else
        {
            $order_no = sprintf("%03d", 0).($order->id+1);
        }
        $y = $this->financialYear();
        $countries = DB::table('countries')->select('id','name')->get();
        return view('billing::create',compact('countries','order_no','y'));
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
            'company_name' => 'required',
            'address_1' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'gstin' => 'nullable|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
            'pan' => 'nullable|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
            'preffix' => 'required',
            'suffix' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $logo  = NULL;
        if($request->file('logo')) {
            $fileName = time().'_'.$request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');
            $logo = time().'_'.$request->file('logo')->getClientOriginalName();
           
        }
        $input['logo'] = $logo;
        $input['invoice_number'] = $input['preffix'].$input['order_no'].$input['suffix'];
        $input['status'] = isset($input['status']) ? 1 : 0;
        Billing::create($input);
        return redirect()->route('billing.index')
        ->with('success','Billing created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('billing::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $billing = Billing::find($id);
        $countries = DB::table('countries')->select('id','name')->get();
        return view('billing::edit',compact('billing','countries'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'company_name' => 'required',
            'address_1' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'gstin' => 'nullable|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
            'pan' => 'nullable|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
            'status' => 'required',
        ]);
        $billing = Billing::find($id);
        $input = $request->all();
        $request->except('_method', '_token');
        unset($input['_token']);
        unset($input['_method']);
        $logo  = $billing->logo;
        if($request->file('logo')) {
            $fileName = time().'_'.$request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');
            $logo = time().'_'.$request->file('logo')->getClientOriginalName();
           
        }
        $input['logo'] = $logo;
        $input['status'] = isset($input['status']) ? 1 : 0;
        #dd($input);die;
        $billing->update($input);
        return redirect()->route('billing.index')
        ->with('success','Billing update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $billing = Billing::find($id);

        if($billing)
        {
            $billing->delete();
            return redirect()->route('billing.index')->with('success','Billing deleted successfully');
        }
    }


    //fetch states

    public function fetchState(Request $request)
    {
        $data['states'] = DB::table('states')->where("country_id", $request->country_id)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }

    //fetch city
    public function fetchCity(Request $request)
    {
        $data['cities'] = DB::table('cities')->where("state_id", $request->state_id)
                                    ->get(["name", "id"]);
                                      
        return response()->json($data);
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
}
