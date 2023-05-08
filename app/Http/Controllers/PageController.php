<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\CountryCategory;
use App\Models\State;
use App\Models\Blog;
use App\Models\Offer;


class PageController extends Controller
{
     
  public function page($slug=null)
  {

    if($slug)
    {
      switch ($slug) {
        case 'blog':
          $data = Blog::where('status',1)->get();
            break;
        case 'offers':
          $data = Offer::where('status',1)->get();
          break;
        
    }
   
    return view('frontend.'.$slug,compact('data'));

    }
    else
    {
        $country_cate = CountryCategory::with('country')->where('status',1)->get();
        $countries    = Country::where('status',1)->get();
        $states       = State::where('status',1)->get();
        $blogs        = Blog::where('status',1)->take(3)->get();
        return view('frontend.index',compact('country_cate','countries','states','blogs'));

    }
    
  }
  

 
}
