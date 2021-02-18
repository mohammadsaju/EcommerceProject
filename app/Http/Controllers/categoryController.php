<?php

namespace App\Http\Controllers;

use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //=========category page===========//
    public function index(){
        $categories = category::latest()->get();
        return view('admin.category.category_index',compact('categories'));
    }
    //=========category add page and inserted==========//
    public function addCategory(){
        return view('admin.category.category_add');
    }
    public function insertCategory(Request $request){
         $request->validate([
             'category_name' => 'required',
             'category_slug' => 'required | unique:categories',
         ]);
         category::insert([
             'category_name'  => $request->category_name,
             'category_slug'  => $request->category_slug,
             'created_at'     => Carbon::now(),
         ]);
         return redirect()->route('category')->with('success','category inserted successfully!');
    }
    //=============edit category=================//
    public function editCategory($id){
        $category = category::find($id);
        return view('admin.category.edit_category',compact('category'));

    }
    public function updateCategory(Request $request,$id){
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required | unique:categories',
        ]);

       $data = category::find($id);
       $data->category_name = $request->category_name;
       $data->category_slug = $request->category_slug;
       $data->updated_at    = Carbon::now();
       $data->save();
       return redirect()->route('category')->with('success','category updated successfully!');
    }
    //==============delete category-==============//
    public function deleteCategory($id){
        $delete = category::find($id);
        $delete->delete();
        return redirect()->route('category')->with('danger','category deleted!');
    }

    //===================category active and inactive=============//
    public function inactiveCategory($id){
        $data = category::find($id);
        $data->category_status = 0;
        $data->save();
        return redirect()->back()->with('warning','category inactivated');
    }
    public function activeCategory($id){
        $data = category::find($id);
        $data->category_status = 1;
        $data->save();
        return redirect()->back()->with('success','category activated');
    }
}
