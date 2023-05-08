<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visa;
use App\Models\VisaCategory;
use App\Models\Country;
use App\Models\State;
use App\Models\Traveller;
use App\Models\TravellerDetail;
use App\Models\TravellerDocument;
use App\Models\Document;
use App\Models\User;
use Validator;
use Session;
use Auth;
use Carbon\Carbon;


class CountryController extends Controller
{
    //

    public function country($country)
    {
        $country_id = Country::where('slug',$country)->value('id');
        $visa_category = VisaCategory::with(['visa' => function($q) use ($country_id) {
            $q->where(['country_id'=>$country_id,'status'=>1]);
        }])->get();
        return view('frontend.country',compact('visa_category'));


    }

    public function visa(Request $request,$id)
    {
        if (Auth::user()) {
            $request->session()->forget('traveller_id');

        $visa_detail = Visa::with('visa_cat','visa_country')->where('id',$id)->first();
        $documentsIds = explode(",",$visa_detail->visa_country->documents);
        $documents = Document::select('id','title')->whereIn('id',$documentsIds)->get();
        $states = State::select('id','name')->where('status',1)->get();
        $traveller = Traveller::where(['visa_id'=>$id,'status'=>0,'user_id'=>Auth::user()->id])->with(['documents'=>function($query){
            $query->with('member');
            
        },'travellers'])->first();
        //dd($traveller);
        return view('frontend.visa',compact('visa_detail','states','traveller','documents'));
        }
        else{
            return redirect('/');

        }
  
    }

    public function apply(Request $request)
    {
        //print_r($_FILES);exit;
        $data = $request->all();
        $user = User::find(Auth::user()->id);
        $id = isset($request->traveller_id) ? :0;
        if(isset($data['step']) && $data['step']=='step-1')
        {
            unset($data['step']);
            $data['user_id'] = Auth::user()->id;
            $id = $request->traveller_id;
            if (!empty($id) && Traveller::where(['id'=>$id,'status'=>0])->exists()) 
            {
                $traveller = Traveller::find($id);
                $traveller->update($data);

             }
             else{
                $result = Traveller::create($data);
                $id=$result->id;
                $user->steps = 1;
                $user->save();
                
             }
             
             $msg = "";
             
        }
        else if(isset($data['step']) && $data['step']=='step-2')
        {
            unset($data['step']);
            
            $visa_detail = Visa::with('visa_country')->where('id',$data['visa_id'])->first();
            $documentsIds = explode(",",$visa_detail->visa_country->documents);
            $documents = Document::select('id','title')->whereIn('id',$documentsIds)->get();
            $TravellerDetail = TravellerDetail::where('traveller_id',$id)->get();
            if($TravellerDetail->count()==0)
            {
                $user->steps = 2;
                $user->save();
            }
            $html = "";
           if(isset($request->traveller))
           {
            foreach($data['traveller'] as $traveller)
            {
                $input['title'] = $traveller['title'];
                $input['first_name'] = $traveller['first_name'];
                $input['middle_name'] = $traveller['middle_name'];
                $input['last_name'] = $traveller['last_name'];
                $input['dob'] = $traveller['dob'];
                $input['mobile_number'] = $traveller['mobile_number'];
                $input['email_id'] = $traveller['email_id'];
                $input['occupetion'] = $traveller['occupetion'];
                $input['designation'] = $traveller['designation'];
                $input['passport_number'] = $traveller['passport_number'];
                $input['exp_date'] = $traveller['exp_date'];
                $input['traveller_id'] = $id;
                $input['user_id'] = Auth::user()->id;
                $input['visa_id'] = $data['visa_id'];
                $result = TravellerDetail::create($input);
                
            }
        }
          $travellers = TravellerDetail::where('traveller_id',$id)->get();
          $doc = TravellerDocument::with('member')->where('traveller_id',$id)->get();
          if($doc->count()>0)
          {
                foreach($doc as $d)
                {
                $html .= '<div class="row">
                <div class="col-md-4">
                <p>Name: '.$d->member->first_name.'</p>
                <p>Passport Number: '.$d->member->passport_number.'</p>
                </div>
                <div class="col-md-4">
                <img src='.asset("storage/uploads/".$d->document).'>
                </div>
                <div class="form-group">
                <button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i>Edit</button>
                </div>
              </div>';
                }
            }
        foreach($travellers as $tr)
        {
           $html.= "<div class='row'><div class='document-user-detail'><p><i class='fa fa-user' aria-hidden='true'></i>  Name: ".$tr->first_name."</p><p><i class='fa fa-credit-card' aria-hidden='true'></i>  Passport Number: " .$tr->passport_number."</p></div>" ;
           foreach($documents as $k=>$document)
           {
            $html.= "<div class='form-group'>
            <div class='file file--upload'>
           <label for='input-file_".$tr->id.$document->id."'>
           <i class='fa fa-cloud'></i>".$document->title."
           </label>
           <input id='input-file_".$tr->id.$document->id."' type='file' name='doc[".$tr->id."][]'/>
            </div></div>";
           }
           $html.= "</div>";
        }
       
       
        $id = $request->traveller_id;
        $msg=$html;
    }
    else if(isset($data['step']) && $data['step']=='step-3')
    {
        $documents = TravellerDocument::where('traveller_id',$id)->get();
        if($documents->count()==0)
        {
        $user->steps = 3;
        $user->save(); 
        }
        $path = public_path().'/storage/uploads/';
        if(isset($_FILES['doc']))
        {
        foreach($_FILES['doc']['name'] as $key=>$val)
        {
            foreach($val as $k=>$v)
            {
                
                $tmp_name = $_FILES['doc']['tmp_name'][$key][$k];
                $uploadfile = time()."-".rand(1000, 9999)."-".$v; 
                if(move_uploaded_file($tmp_name, $path.$uploadfile))
                {
                    $doc['document'] = $uploadfile;
                    $doc['member_id'] = $key;
                    $doc['traveller_id'] = $id;
                    $result = TravellerDocument::create($doc);

                }
            }
        }
    }
    
     
        $visa_detail = Visa::find($request->visa_id);
        $traveller = Traveller::where(['visa_id'=>$request->visa_id,'status'=>0,'user_id'=>Auth::user()->id,'id'=>$id])->with(['documents'=>function($query){
            $query->with('member');
        },'travellers','state_name'])->first();
        $id = $request->traveller_id;
        $msg = view('frontend.final',compact('visa_detail','traveller'))->render();
    }
  
    return response()->json(['success' =>true, 'data' =>$msg,'id'=>$id]);

    }


    public function getSteps(Request $request)
    {
        $states = State::select('id','name')->where('status',1)->get();
        $visa_detail = Visa::with('visa_cat','visa_country')->where('id',$request->visa_id)->first();
        $traveller = Traveller::with('travellers')->where('id',$request->traveller_id)->first();

       if($request->step=='step-1')
       {
        return response()->json([
            'html' => view('frontend.step-1', compact('traveller','states','visa_detail'))->render(),
        ]);
        
       }
       if($request->step=='step-2')
       {

        return response()->json([
            'html' => view('frontend.step-2', compact('traveller','states','visa_detail'))->render(),
        ]);
        
       }
    }

    public function editTraveller(Request $request)
    {
        $data = TravellerDetail::find($request->tid);
        return response()->json([
            'html' => view('frontend.travller', compact('data'))->render(),
        ]);
        
    }

    public function UpdateTraveller(Request $request)
    {
        $input = $request->all();
        $tid = $request->tid;
        $validator = Validator::make($input, [
            'title' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required|date',
            'mobile_number' => 'required',
            'email_id' => 'required',
            'occupetion' => 'required',
            'designation' => 'required',
            'passport_number' => 'required|unique:traveller_details,passport_number,'.$tid,
            'exp_date' => 'required|date',
        ],
       
    );
    if ($validator->fails()) {
    
        return response()->json(['success'=>false,'errors'=>$validator->errors()]);

    }
    else{
        $tr = TravellerDetail::find($tid);
        $tr->title = $request->title;
        $tr->first_name = $request->first_name;
        $tr->middle_name = $request->middle_name;
        $tr->last_name = $request->last_name;
        $tr->dob = $request->dob;
        $tr->mobile_number = $request->mobile_number;
        $tr->email_id = $request->email_id;
        $tr->occupetion = $request->occupetion;
        $tr->designation = $request->designation;
        $tr->passport_number = $request->passport_number;
        $tr->exp_date = $request->exp_date;
        $tr->save();
        return response()->json(['success'=>true,'errors'=>[],'msg'=>'Success! updated']);

    }
    }

    public function deleteTraveller(Request $request)
    {
        $tid = $request->tid;
        $tr = TravellerDetail::find($tid);
        if($tr)
        {
            $tr->member_docs()->delete();
            TravellerDetail::destroy($tid);
            return response()->json(['success'=>true,'errors'=>[],'msg'=>'Success! deleted']);

        }
    }

    public function editDocs(Request $request)
    {
        $data = TravellerDetail::with('member_docs')->where('id',$request->tid)->first();
        return response()->json([
            'html' => view('frontend.document', compact('data'))->render(),
        ]);
    }

    public function UpdateDocs(Request $request)
    {
        $count = count(array_filter($_FILES['document']['name']));
        $path = public_path().'/storage/uploads/';
        if($count>0)
        {
        foreach($_FILES['document']['name'] as $key=>$val)
        {
                $tmp_name = $_FILES['document']['tmp_name'][$key];
                if(isset($tmp_name))
                {
                $uploadfile = time()."-".rand(1000, 9999)."-".$val; 
                if(move_uploaded_file($tmp_name, $path.$uploadfile))
                {
                    $doc = TravellerDocument::find($key);
                    $doc->document = $uploadfile;
                    $doc->save();

                }
            }
        }
        return response()->json(['success'=>true,'errors'=>[],'msg'=>'Success! updated']);

    }
    else{
        return response()->json(['success'=>false,'errors'=>[],'msg'=>'error! please upload']);

    }
    }
}
