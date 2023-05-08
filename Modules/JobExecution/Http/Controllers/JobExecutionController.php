<?php

namespace Modules\JobExecution\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\JobExecution;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class JobExecutionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data = JobExecution::orderBy('id','DESC')->paginate(10);
         return view('jobexecution::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
  
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('jobexecution::create');
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
            'status' => 'required',
        ]);
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;
        JobExecution::create($input);
        return redirect()->route('jobexecution.index')
        ->with('success','Job Execution created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('jobexecution::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $jobexecution = JobExecution::find($id);
        return view('jobexecution::edit',compact('jobexecution'));
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
        ]);
        $jobexecution = JobExecution::find($id);
        $input = $request->all();
        $request->except('_method', '_token');
        unset($input['_token']);
        unset($input['_method']);
        $input['status'] = isset($input['status']) ? 1 : 0;
        $jobexecution->update($input);
        return redirect()->route('jobexecution.index')
        ->with('success','Job Execution update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $jobexecution = JobExecution::find($id);

        if($jobexecution)
        {
            $jobexecution->delete();
            return redirect()->route('jobexecution.index')->with('success','JobExecution deleted successfully');
        }
    }
}
