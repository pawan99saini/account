<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Party;
use App\Models\PaymentReceipt;
use App\Models\Bank;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = PaymentReceipt::orderBy('id','DESC')->paginate(10);
         return view('payment::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
  
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $parties = Party::select('id','name')->where('status',1)->get();
        $banks = Bank::select('id','name')->where('status',1)->get();
        return view('payment::create',compact('parties','banks'));
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
            'searial_number' => 'required',
            'payment_date' => 'required',
            'narration' => 'required',
            'bank_id' => 'required',
            'party_id' => 'required',
            'amount' => 'required|numeric',
        ]);
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['payment_date'] = date("Y-m-d", strtotime($input['payment_date']));
        PaymentReceipt::create($input);
        return redirect()->route('payment.index')
        ->with('success','Payment created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('payment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $payment = PaymentReceipt::find($id);
        $parties = Party::select('id','name')->where('status',1)->get();
        $banks = Bank::select('id','name')->where('status',1)->get();
        return view('payment::edit',compact('payment','parties','banks'));
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
            'searial_number' => 'required',
            'payment_date' => 'required',
            'narration' => 'required',
            'bank_id' => 'required',
            'party_id' => 'required',
            'amount' => 'required|numeric',
        ]);
        $payment = PaymentReceipt::find($id);
        $input = $request->all();
        $request->except('_method', '_token');
        unset($input['_token']);
        unset($input['_method']);
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['payment_date'] = date("Y-m-d", strtotime($input['payment_date']));
        $payment->update($input);
        return redirect()->route('payment.index')
        ->with('success','Payment update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $payment = PaymentReceipt::find($id);

        if($payment)
        {
            $payment->delete();
            return redirect()->route('payment.index')->with('success','Payment deleted successfully');
        }
    }
}
