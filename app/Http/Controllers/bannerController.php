<?php

namespace App\Http\Controllers;

use App\Models\homeBanner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class bannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //==========banner page=============//
    public function index(){
        $banners = homeBanner::latest()->get();
        return view('admin.banner.index_banner',compact('banners'));
    }
    //========add banner==========//
    public function addBanner(){
        return view('admin.banner.add_banner');
    }
    //==============insert banner=============//
    public function insertBanner(Request $request){
        $request->validate([
            'collection_name'    => 'required',
            'discount'           => 'required',
            'short_describtion'  => 'required',
            'btn_txt'            => 'required',
            'btn_link'           => 'required',
            'image'              => 'required | mimes: jpg,jpeg,png,gif',
        ]);

        $img_one = $request->file('image');
         $name_gen = hexdec(uniqid()) . '.' . $img_one->getClientOriginalExtension();
         Image::make($img_one)->resize(270, 250)->save('backend/images/products/' . $name_gen);
         $image_url_one = 'backend/images/products/' . $name_gen;

        homeBanner::insert([
            'collection_name'    => $request->collection_name,
            'discount'           => $request->discount,
            'short_describtion'  => $request->short_describtion,
            'btn_txt'            => $request->btn_txt,
            'btn_link'           => $request->btn_link,
            'image'              => $image_url_one,
            'created_at'         => Carbon::now()
        ]);
        return redirect()->route('banner')->with('success','banner inserted successfully');
    }
     //==============delete banner-==============//
     public function deleteBanner($id){
        $delete = homeBanner::find($id);
        $delete->delete();
        return redirect()->route('banner')->with('danger','banner deleted!');
    }

    //===================banner active and inactive=============//
    public function inactiveBanner($id){
        $data = homeBanner::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back()->with('warning','banner inactivated');
    }
    public function activeBanner($id){
        $data = homeBanner::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success','banner activated');
    }

    //==============edit banner=============//
    public function editBanner($id){
        $banner = homeBanner::find($id);
        return view('admin.banner.edit_banner',compact('banner'));
    }
    //==============update banner===============//
    public function updateBanner(Request $request,$id){
        $request->validate([
            'collection_name'    => 'required',
            'discount'           => 'required',
            'short_describtion'  => 'required',
            'btn_txt'            => 'required',
            'btn_link'           => 'required',
        ]);

        $old_one = $request->old_image;
        if($request->has('image')){
            unlink($old_one);
            $img_one = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $img_one->getClientOriginalExtension();
            Image::make($img_one)->resize(270, 250)->save('backend/images/products/' . $name_gen);
            $image_url_one = 'backend/images/products/' . $name_gen;

            $data = homeBanner::find($id);
            $data->collection_name   = $request->collection_name;
            $data->discount          = $request->discount;
            $data->short_describtion = $request->short_describtion;
            $data->btn_txt           = $request->btn_txt;
            $data->btn_link          = $request->btn_link;
            $data->image             = $image_url_one;
            $data->save();
            return redirect()->route('banner')->with('success','banner updated successfully');
        }
    
      
    }
    


}

