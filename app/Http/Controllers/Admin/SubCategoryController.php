<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index(){
        $categoryes=Subcategory::latest()->get();
        return view('admin.alldubcategory',compact('categoryes'));
    }
    public  function  AddsubCategory(){
        $categorys=Category::latest()->get();
        return view('admin.addsubcategory',compact('categorys'));
    }
    public  function  StoresubCategory(Request $request){

        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id'=>'required',

        ]);
        $category_id=$request->category_id;
        $category_name=Category::where('id',$category_id)->value('category_name');
        Subcategory::insert([
            'subcategory_name'=>$request->subcategory_name,
            'slug'=>strtolower(str_replace('','-',$request->subcategory_name)),
            'category_id'=>$category_id,
            'category_name'=>$category_name,

        ]);
         Category::where('id',$category_id)->increment('subcategory_count',1);
        return redirect()->route('allsubcategory')->with('message','sub category added Successfully');

    }
    public  function  EditsubCategory($id){
        $subcategory_info=Subcategory::findOrFail($id);
        return view('admin.editsubcategory',compact('subcategory_info'));

    }
    public  function  UpdatesubCategory(Request $request){
        $category_id=$request->subcategory_id;
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',

        ]);
        Subcategory::findOrFail($category_id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug'=>strtolower(str_replace('','-',$request->subcategory_name))

        ]);
        return redirect()->route('allsubcategory')->with('message','sub category Update Successfully');

    }
    public function DeletesubCategory($id){
        $cat_id=Subcategory::where('id',$id)->value('category_id');
        Subcategory::findOrFail($id)->delete();
        Category::with('id',$cat_id)->decrement('subcategory_count',1);
        return redirect()->route('allsubcategory')->with('message','sub category Delete Successfully');

    }
}
