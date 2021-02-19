<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Facade\FlareClient\View;
use Illuminate\Http\Request;


class customerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //=========customer page===========//
    public function index(){
        $customers = customer::latest()->get();
        return View('admin.customer.index_customer',compact('customers'));
    }
    //==============view=============//
    public function viewCustomer($id){
        $customer = customer::find($id);
        return view('admin.customer.view_customer',compact('customer'));
    }
     //===================customer active and inactive=============//
     public function inactiveCustomer($id){
        $data = customer::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back()->with('warning','customer id inactivated');
    }
    public function activeCustomer($id){
        $data = customer::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success','customer id activated');
    }
}
