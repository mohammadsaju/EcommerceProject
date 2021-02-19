<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;
use Image;

class brandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //==============brand page==========//
    public function index(){
        $brands = brand::latest()->get();
        return view('admin.brand.brand_index',compact('brands'));
    }
    //============add brand=============//
    public function addBrand(){
        return view('admin.brand.add_brand');
    }
    public function insertBrand(Request $request){
        $request->validate([
            'brand_name'  => 'required',
            'brand_image' => 'required | mimes: jpg,jpeg,png,gif',
        ]);

        $img_one = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $img_one->getClientOriginalExtension();
        Image::make($img_one)->resize(270, 250)->save('backend/images/products/' . $name_gen);
        $image_url_one = 'backend/images/products/' . $name_gen;

        brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image'=> $image_url_one
        ]);
        return redirect()->route('brand')->with('success','brand inserted successfully');
    }
    //==============edit brand===============//
    public function editBrand(Request $request,$id){
        $brand = brand::find($id);
        return view('admin.brand.edit_brand',compact('brand'));
    }

    public function updateBrand(Request $request,$id){
        $request->validate([
            'brand_name'  => 'required'
        ]);
        $old_one = $request->old_image;
        if($request->has('brand_image')){
            unlink($old_one);
            $img_one = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $img_one->getClientOriginalExtension();
            Image::make($img_one)->resize(270, 250)->save('backend/images/products/' . $name_gen);
            $image_url_one = 'backend/images/products/' . $name_gen;

            $data = brand::find($id);
            $data->brand_name = $request->brand_name;
            $data->brand_image= $image_url_one;
            $data->save();
            return redirect()->route('brand')->with('success','brand updated successfully');
        }
    }
    //===========delete brand============//
    public function deleteBrand($id){
        $delete = brand::find($id);
        $delete->delete();
        return redirect()->back()->with('danger','brand item has been removed');
    }
     //===================brand active and inactive=============//
     public function inactiveBrand($id){
        $data = brand::find($id);
        $data->brand_status = 0;
        $data->save();
        return redirect()->back()->with('warning','the brand is inactivated');
    }
    public function activeBrand($id){
        $data = brand::find($id);
        $data->brand_status = 1;
        $data->save();
        return redirect()->back()->with('success','the brand is activated');
    }
}
