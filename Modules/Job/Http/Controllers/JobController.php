<?php

namespace Modules\Job\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Job;
use App\Models\Category;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JobsImport;
use App\Exports\JobExport;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $status = $request->status;
        $data = Job::when($keyword, function ($query, $keyword) {
            return $query->where('name', 'LIKE', '%' . $keyword . '%');
        })
        ->when($status, function ($query, $status) {
            $status = $status==5 ? 0 : $status;
            return $query->where('is_used', $status);

        })->orderBy('id','DESC')->paginate(10);
         return view('job::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
  
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::select('id','name')->where('status',1)->get();
        return view('job::create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        
        $input = $request->all();
        if($request->file('csv'))
        {
            Excel::import(new JobsImport, $request->file('csv')->store('temp'));

        }
        else{
            $this->validate($request, [
                'name' => 'required|unique:jobs,name',
            ]);
            $input['status'] = isset($input['status']) ? 1 : 0;
            Job::create($input);
        }

        return redirect()->route('job.index')
        ->with('success','Job created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('job::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        
        $job = Job::find($id);
        $categories = Category::select('id','name')->where('status',1)->get();

        return view('job::edit',compact('job','categories'));
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
            'name' => 'required|unique:jobs,name,'.$id,
        ]);
        $job = Job::find($id);
        $input = $request->all();
        $request->except('_method', '_token');
        unset($input['_token']);
        unset($input['_method']);
        $input['status'] = isset($input['status']) ? 1 : 0;
        $job->update($input);
        return redirect()->route('job.index')
        ->with('success','Job update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $Job = Job::find($id);
        if($Job)
        {
            $is_used = $Job->is_used==4 ? 0 : 4;
            $Job->is_used = $is_used;
            $Job->save();
            return redirect()->route('job.index')->with('success','job updated successfully');
        }
    }

    //export

    public function download(Request $request)
    {
      
        $keyword = $request->keyword;
        $status = $request->status;
        $where = [];
        if($keyword)
        {
            $where[] = ['name', 'like', '%' . $keyword . '%']; 
        }
        if($status)
        {
            $status = $status == 2 ? 0 : 1;
            $where[] = ['status', '=', $status]; 
        }
        return Excel::download(new JobExport($where), 'jobs.xlsx');

    }

    public function changeJobStatus(Request $request)
    {
            $id = $request->id;
            $Job = Job::find($id);
            $Job->is_used = $request->status;
            if($Job->save())
            {
                return response()->json(array('success' => true));

            }
            else
            {
                return response()->json(array('success' => false));

            }
    }
}
