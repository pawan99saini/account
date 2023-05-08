<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Hash;
use Carbon\Carbon;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(10);
        return view('users::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $roles = Role::where('name','!=','admin')->pluck('name','name')->all();
        return view('users::create',compact('roles'));
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
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
        ->with('success','User created successfully');

    
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $user = User::with('address','contact_details','qualification','skills','department')->find($id);
        return view('users::show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user = User::find($id);
        //dd($user);
        $roles = Role::where('name','!=','admin')->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users::edit',compact('user','roles','userRole'));
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
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required'
        ]);
        $user = User::find($id);

        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0 ;

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

            return redirect()->route('users.index')
                        ->with('success','User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
       
        //
        $user = User::find($id);
        //$role = $user->roles->pluck('name')[0];

        if($user)
        {
            $user->delete();
            return redirect()->route('users.index')->with('success','User deleted successfully');
        }
       
       
      
    }

    //export excel

    public function export(Request $request) 
    {
        $role = $request->input('role');
        return Excel::download(new UsersExport($role), 'users.xlsx');
    }
}
