<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = Service::with('category')->orderBy('id','DESC')->paginate(10);
        //dd($data);
         return view('service::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
  
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::select('id','name')->where('status',1)->get();
        return view('service::create',compact('categories'));
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
            'name' => 'required',
            'category_id' => 'required',
            'narration' => 'required',
            'sac_code' => 'required|digits_between:4,8',
            'gst' => 'required',
            'rate' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;
        Service::create($input);
        return redirect()->route('service.index')
        ->with('success','Service created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('service::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $categories = Category::select('id','name')->where('status',1)->get();

        return view('service::edit',compact('service','categories'));
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
            'name' => 'required',
            'sac_code' => 'required|digits_between:4,8',

        ]);
        $service = Service::find($id);
        $input = $request->all();
        $request->except('_method', '_token');
        unset($input['_token']);
        unset($input['_method']);
        $input['status'] = isset($input['status']) ? 1 : 0;
        $service->update($input);
        return redirect()->route('service.index')
        ->with('success','Service update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        if($service)
        {
            $service->delete();
            return redirect()->route('service.index')->with('success','Service deleted successfully');
        }
    }
}
