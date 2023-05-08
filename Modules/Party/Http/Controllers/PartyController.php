<?php

namespace Modules\Party\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Party;
use App\Models\Group;
use App\Models\ChannelPartner;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Arr;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    
    public function index(Request $request)
    {
        $data = Party::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->keyword)) {
                    $query->orWhere('name', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->orderBy('id','DESC')->paginate(10);
         return view('party::index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $groups = Group::where('status',1)->select('id','name')->get();
        $channel_partners = ChannelPartner::where('status',1)->select('id','name')->get();
        $countries = DB::table('countries')->select('id','name')->get();
        return view('party::create',compact('groups','channel_partners','countries'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'group_id' => 'required',
            'partner_id' => 'required',
            'cell_phone' => 'required',
            'client_gst_number' => 'nullable|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
            'email' => 'nullable|email',
            'pan' => 'nullable|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
        ]);
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;
        Party::create($input);
        return redirect()->route('parties.index')
        ->with('success','Party created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('party::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $groups = Group::where('status',1)->select('id','name')->get();
        $channel_partners = ChannelPartner::where('status',1)->select('id','name')->get();
        $party = Party::find($id);
        $countries = DB::table('countries')->select('id','name')->get();
        return view('party::edit',compact('groups','channel_partners','party','countries'));

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
            'address' => 'required',
            'group_id' => 'required',
            'partner_id' => 'required',
            'cell_phone' => 'required',
            'client_gst_number' => 'nullable|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
            'email' => 'nullable|email',
            'pan' => 'nullable|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pincode' => 'required',
        ]);
        $group = Party::find($id);
        $input = $request->all();
        $request->except('_method', '_token');
        unset($input['_token']);
        unset($input['_method']);
        $input['status'] = isset($input['status']) ? 1 : 0;
        $group->update($input);
        return redirect()->route('parties.index')
        ->with('success','Party update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function viewParties(Request $request)
    {
       // dd($request->all());
       $data = NULL;
        if(isset($request->group_id))
        {
            $data = Party::where(['status'=>1,'group_id'=>$request->group_id])->get();
        }
        $groups = Group::where('status',1)->select('id','name')->get();
        return view('party::view',compact('groups','data'));

    }
}
