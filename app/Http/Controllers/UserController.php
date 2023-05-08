<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Traveller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Response;
use Validator;
use URL;
use Illuminate\Support\Arr;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Pdf;


class UserController extends Controller
{
    //

    public function myProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('frontend.user.profile',compact('user'));

    }

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $input = $request->all();
        $validator = Validator::make($input, [
            'email' => 'required|email|unique:users,email,'.$id,
        ],
       
    );
        if ($validator->fails()) {
    
            return response()->json(['success'=>false,'errors'=>$validator->errors()]);

        }
        else{
       
        $user = User::find($id);

        
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        $user->update($input);
        return response()->json(['success'=>true]);

    }
    }


    public function booking()
    {
        $bookings = Traveller::where('user_id',Auth::user()->id)->get();
        return view('frontend.user.booking',compact('bookings'));


    }

    public function viewBooking($id)
    {
        $booking = Traveller::with(['visa_detail','state_name','travellers','payments'])->where('id',$id)->first();
        //dd($booking);
        return view('frontend.user.view-booking',compact('booking'));

    }

    public function forgotPassword()
    {
        return view('frontend.user.forgot-password');

    }

    public function resetPassword(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'email' => 'required|email',
        ],
       
    );
    if ($validator->fails()) {
    
        return response()->json(['success'=>false,'errors'=>$validator->errors()]);

    }
    else{
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['success'=>false,'errors'=>[],'msg'=>'Failed! email is not registered.']);
        }

        $token = Str::random(60);

        $user['token'] = $token;
        $user->save();

        if(Mail::to($request->email)->send(new ResetPassword($user->first_name, $token)));
        return response()->json(['success'=>true,'errors'=>[],'msg'=>'Success! password reset link has been sent to your email']);

      
    }
    }

    public function forgotPasswordValidate($token)
    {
        $user = User::where('token', $token)->first();
        if ($user) {
            $email = $user->email;
            return view('frontend.user.change-password', compact('email'));
        }
        return redirect()->route('forgot-password')->with('failed', 'Password reset link is expired');
    }

    public function updatePassword(Request $request) {
        $input = $request->all();
        $validator = Validator::make($input, [
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ],
       
    );
    if ($validator->fails()) {
    
        return response()->json(['success'=>false,'errors'=>$validator->errors()]);

    }
    else
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user['token'] = '';
            $user['password'] = Hash::make($request->password);
            $user->save();
            return response()->json(['success'=>true,'errors'=>[],'msg'=>'Password Change successfully']);
        }
    }
    }

    public function downloadForm($id)
    {
        $booking = Traveller::with(['visa_detail.visa_country','state_name','travellers','payments'])->where('id',$id)->first();
        $pdf = PDF::loadView('pdf.download-form',compact('booking'));
        return $pdf->stream('visa.pdf');
    }
}
