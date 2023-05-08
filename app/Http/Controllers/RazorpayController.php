<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;
use App\Models\Traveller;
use App\Models\TravellerDetail;
use App\Models\TravellerDocument;
use App\Models\User;
use Session;
use Auth;
use Carbon\Carbon;

class RazorpayController extends Controller
{    
    

    public function payment(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        $payment = $api->payment->fetch($request->razorpay_payment_id);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {

                $payment->capture(array('amount'=>$payment['amount']));

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        $payInfo = [
                   'payment_id' => $request->razorpay_payment_id,
                   'user_id' => Auth::user()->id,
                   'amount' => $request->amount,
                   'traveller_id' => $request->traveller_id,
                   'status' => 1,
                   'visa_id' => $request->traveller_id,
                ];
                
        if(Payment::create($payInfo))
        {
            $tr = Traveller::find($request->traveller_id);
            $tr->status = 1;
            $tr->save();
            TravellerDetail::where("traveller_id",$request->traveller_id)
            ->update( 
                   array( 
                         "status" =>1,
                         )
                   ); 
            TravellerDocument::where("traveller_id",$request->traveller_id)
            ->update( 
                   array( 
                         "status" =>1,
                         )
                   );
                  
                   $user = User::find(Auth::user()->id);
                   $user->steps = 0;
                   $user->save();
                   $request->session()->forget('traveller_id');

                    return response()->json(['success' => true,'msg'=>'Payment Successfull']);
        }  
        else{
            return response()->json(['success' => false,'msg'=>'Error!']);

        }
        
        //\Session::put('success', 'Payment successful');

        //return response()->json(['success' => 'Payment successful']);
    }
}
