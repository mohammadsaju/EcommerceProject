<?php

namespace App\Http\Controllers;

use App\Models\color;
use Carbon\Carbon;
use Illuminate\Http\Request;

class colorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //=========color page===========//
    public function index(){
        $colors = color::latest()->get();
        return view('admin.color.color_index',compact('colors'));
    }
    //=========color add page and inserted==========//
    public function addColor(){
        return view('admin.color.color_add');
    }
    public function insertColor(Request $request){
         $request->validate([
             'color_name'     => 'required'
         ]);
         color::insert([
             'color_name'      => $request->color_name,
             'created_at'       => Carbon::now(),
         ]);
         return redirect()->route('color')->with('success','color inserted successfully!');
    }
    //=============edit color=================//
    public function editColor($id){
        $color = color::find($id);
        return view('admin.color.edit_color',compact('color'));

    }
    public function updateColor(Request $request,$id){
        $request->validate([
            'color_name'     => 'required',
        ]);

       $data = color::find($id);
       $data->color_name = $request->color_name;
       $data->updated_at    = Carbon::now();
       $data->save();
       return redirect()->route('color')->with('success','color updated successfully!');
    }
    //==============delete color-==============//
    public function deleteColor($id){
        $delete = color::find($id);
        $delete->delete();
        return redirect()->route('size')->with('danger','color deleted!');
    }

    //===================color active and inactive=============//
    public function inactiveColor($id){
        $data = color::find($id);
        $data->color_status = 0;
        $data->save();
        return redirect()->back()->with('warning','color inactivated');
    }
    public function activeColor($id){
        $data = color::find($id);
        $data->color_status = 1;
        $data->save();
        return redirect()->back()->with('success','color activated');
    }
}
