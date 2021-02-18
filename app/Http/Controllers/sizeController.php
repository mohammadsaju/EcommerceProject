<?php

namespace App\Http\Controllers;

use App\Models\size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class sizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //=========size page===========//
    public function index(){
        $sizes = size::latest()->get();
        return view('admin.size.size_index',compact('sizes'));
    }
    //=========size add page and inserted==========//
    public function addSize(){
        return view('admin.size.size_add');
    }
    public function insertSize(Request $request){
         $request->validate([
             'size'     => 'required'
         ]);
         size::insert([
             'size'      => $request->size,
             'created_at'       => Carbon::now(),
         ]);
         return redirect()->route('size')->with('success','size inserted successfully!');
    }
    //=============edit size=================//
    public function editSize($id){
        $size = size::find($id);
        return view('admin.size.edit_size',compact('size'));

    }
    public function updateSize(Request $request,$id){
        $request->validate([
            'size'     => 'required',
        ]);

       $data = size::find($id);
       $data->size = $request->size;
       $data->updated_at    = Carbon::now();
       $data->save();
       return redirect()->route('size')->with('success','size updated successfully!');
    }
    //==============delete size-==============//
    public function deleteSize($id){
        $delete = size::find($id);
        $delete->delete();
        return redirect()->route('size')->with('danger','size deleted!');
    }

    //===================size active and inactive=============//
    public function inactiveSize($id){
        $data = size::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back()->with('warning','size inactivated');
    }
    public function activeSize($id){
        $data = size::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back()->with('success','size activated');
    }
}
