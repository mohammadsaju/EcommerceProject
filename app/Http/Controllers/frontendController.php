<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\homeBanner;
use App\Models\product;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
      $categories = category::where('category_status',1)->limit(4)->get();
      $brands     = brand::where('brand_status',1)->latest()->get();
      $banners     = homeBanner::where('status',1)->latest()->get();
      return view('frontend.frontend_index',compact('categories','brands','banners'));
    }
}
