<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class couponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //=========COUPON page===========//
    public function index(){
        $coupons = coupon::latest()->get();
        return view('admin.coupon.coupon_index',compact('coupons'));
    }
    //=========COUPON add page and inserted==========//
    public function addCoupon(){
        return view('admin.coupon.coupon_add');
    }
    public function insertCoupon(Request $request){
         $request->validate([
             'coupon_name'     => 'required',
             'coupon_code'     => 'required | unique:coupons',
             'coupon_discount' => 'required',
         ]);
         coupon::insert([
             'coupon_name'      => $request->coupon_name,
             'coupon_code'      => $request->coupon_code,
             'coupon_discount'  => $request->coupon_discount,
             'created_at'       => Carbon::now(),
         ]);
         return redirect()->route('coupon')->with('success','coupon inserted successfully!');
    }
    //=============edit COUPON=================//
    public function editCoupon($id){
        $coupon = coupon::find($id);
        return view('admin.coupon.edit_coupon',compact('coupon'));

    }
    public function updateCoupon(Request $request,$id){
        $request->validate([
            'coupon_name'     => 'required',
            'coupon_code'     => 'required',
            'coupon_discount' => 'required',
        ]);

       $data = coupon::find($id);
       $data->coupon_name = $request->coupon_name;
       $data->coupon_code = $request->coupon_code;
       $data->coupon_discount = $request->coupon_discount;
       $data->updated_at    = Carbon::now();
       $data->save();
       return redirect()->route('coupon')->with('success','coupon updated successfully!');
    }
    //==============delete COUPON-==============//
    public function deleteCoupon($id){
        $delete = coupon::find($id);
        $delete->delete();
        return redirect()->route('coupon')->with('danger','coupon deleted!');
    }

    //===================COUPON active and inactive=============//
    public function inactiveCoupon($id){
        $data = coupon::find($id);
        $data->coupon_status = 0;
        $data->save();
        return redirect()->back()->with('warning','coupon inactivated');
    }
    public function activeCoupon($id){
        $data = coupon::find($id);
        $data->coupon_status = 1;
        $data->save();
        return redirect()->back()->with('success','coupon activated');
    }
}
