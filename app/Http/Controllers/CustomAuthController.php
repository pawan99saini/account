<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Response;
use Validator;
use URL;
use Illuminate\Support\Arr;

class CustomAuthController extends Controller
{

      
    public function customLogin(Request $request)
    {
        $data = $request->all();
        $redirect = isset($request->redirect) ? $request->redirect : URL::previous();
        $data = isset($request->redirect) ? Arr::except($data,$data['redirect']) : $data;
        $validator = Validator::make($data, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
    
            return response()->json(['success'=>false,'errors'=>$validator->errors()]);

        }
        else{
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) 
        {
            return response()->json(['success'=>true,'redirect'=>$redirect]);

        }
        else{
            return response()->json(['success'=>false,'errors'=>[]]);
  
        }
    }
  
    }

    public function customRegistration(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        if ($validator->fails()) {
    
            return response()->json(['success'=>false,'errors'=>$validator->errors()]);

        }
        else{
            $data = $request->all();
            $user = $this->create($data);
            $user->assignRole(['customer']);
            return response()->json(['success'=>true]);

        }

       
         
    }

    public function create(array $data)
    {
      return User::create([
        'first_name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}