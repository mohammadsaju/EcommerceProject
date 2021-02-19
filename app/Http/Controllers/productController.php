<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class productController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //==========add product page===============//
    public function index(){
        $categories = category::latest()->get();
        $brands    = brand::latest()->get();
        return view('admin.product.add_product',compact('categories','brands'));
    }
    //============insert product==============//
    public function insertProduct(Request $request){
        $request->validate([
            'product_name'        => 'required',
            'product_price'       => 'required',
            'product_code'        => 'required',
            'short_describtion'   => 'required',
            'long_describtion'    => 'required',
            'product_quantity'    => 'required',
            'category_id'         => 'required',
            'brand_id'            => 'required',
            'image_one'           => 'required | mimes: jpg,jpeg,png,gif',  
            'image_two'           => 'required | mimes: jpg,jpeg,png,gif',
            'image_three'         => 'required | mimes: jpg,jpeg,png,gif',
        ]);
        $img_one = $request->file('image_one');
        $name_gen = hexdec(uniqid()) . '.' . $img_one->getClientOriginalExtension();
        Image::make($img_one)->resize(270, 250)->save('backend/images/products/' . $name_gen);
        $image_url_one = 'backend/images/products/' . $name_gen;

        $img_two = $request->file('image_two');
        $name_gen = hexdec(uniqid()) . '.' . $img_two->getClientOriginalExtension();
        Image::make($img_two)->resize(270, 250)->save('backend/images/products/' . $name_gen);
        $image_url_two = 'backend/images/products/' . $name_gen;

        $img_three = $request->file('image_three');
        $name_gen = hexdec(uniqid()) . '.' . $img_three->getClientOriginalExtension();
        Image::make($img_three)->resize(270, 250)->save('backend/images/products/' . $name_gen);
        $image_url_three = 'backend/images/products/' . $name_gen;

        product::insert([
            "product_name"      => $request->product_name,
            "product_slug"      => strtolower(str_replace('', '-', $request->product_name)),
            "product_price"     => $request->product_price,
            "product_code"      => $request->product_code,
            "product_quantity"  => $request->product_quantity,
            "short_describtion" => $request->short_describtion,
            "long_describtion"  => $request->long_describtion,
            "category_id"       => $request->category_id,
            "brand_id"          => $request->brand_id,
            "image_one"         => $image_url_one,
            "image_two"         => $image_url_two,
            "image_three"       => $image_url_three,
            "created_at"        => Carbon::now(),
        ]);
        return redirect()->route('show.product')->with('success','product added successfully');
    }
    //==============show product===========//
    public function showProduct(){
        $products = product::latest()->get();
        return view('admin.product.show_product',compact('products'));
    }
    //===========edit product============//
    public function editProduct($id){
        $product = product::find($id);
        $categories = category::latest()->get();
        $brands     = brand::latest()->get();
        return view('admin.product.edit_product',compact('product','categories','brands'));
    }
    
    public function updateProduct(Request $request,$id){
        $request->validate([
            'product_name'        => 'required',
            'product_price'       => 'required',
            'product_code'        => 'required',
            'short_describtion'   => 'required',
            'long_describtion'    => 'required',
            'product_quantity'    => 'required',
            'category_id'         => 'required',
            'brand_id'            => 'required',
        ]);

        $data = product::find($id);
        $data->product_name       = $request->product_name;
        $data->product_price      = $request->product_price;
        $data->product_code       = $request->product_code;
        $data->short_describtion  = $request->short_describtion;
        $data->long_describtion   = $request->long_describtion;
        $data->product_quantity   = $request->product_quantity;
        $data->category_id        = $request->category_id;
        $data->brand_id           = $request->brand_id;
        $data->save();
        return redirect()->route('show.product')->with('success','product updated successfully');
    }

    //==============delete product-==============//
    public function deleteProduct($id){
        $delete = product::find($id);
        $delete->delete();
        return redirect()->route('show.product')->with('danger','product deleted!');
    }
    //===================product active and inactive=============//
    public function inactiveProduct($id){
        $data = product::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back()->with('warning','product inactivated');
    }
    public function activeProduct($id){
        $data = product::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success','product activated');
    }
}
