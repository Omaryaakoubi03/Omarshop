<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index(){
        $product=Product::latest()->get();

        return view('admin.allproducts',compact('product'));
    }
    public  function  AddProduct(){
        $categorys=Category::latest()->get();
        $subcategorys=Subcategory::latest()->get();

        return view('admin.addproduct',compact('categorys','subcategorys'));
    }
    public  function  StoreProduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quntiti' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',

            'product_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg',


        ]);
        $img=$request->file('product_img');
        $imag_name=hexdec(uniqid()).".".$img->getClientOriginalName();
        $request->product_img->move(public_path("upload"),$imag_name);
        $img_url='upload/'. $imag_name;
        $category_id=$request->product_category_name;
        $subcategory_id=$request->product_subcategory_id;

        $category_name=Category::where('id',$category_id)->value('category_name');
        $subcategory_name=Subcategory::where('id',$subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name'=>$request->product_name,
            'product_short_description'=>$request->product_short_description,
            'product_long_description'=>$request->product_long_description,
            'price'=>$request->price,
            'product_category_name'=>$category_name,
            'product_subcategory_name'=>$subcategory_name,
            'product_category_id'=>$category_id,
            'product_subcategory_id'=>$subcategory_id,
            'product_img'=>$img_url,
            'quntiti'=>$request->quntiti,
            'slug'=>strtolower(str_replace('','-',$request->product_name)),


        ]);
        Category::where('id',$category_id)->increment('product_count',1);
        Subcategory::where('id',$subcategory_id)->increment('product_count',1);

        return redirect()->route('allproducts')->with('message','product added Successfully');

    }
    public  function  EditimageProduct ($id){

        $imageinfoo=Product::where('id',$id)->value('id');;
        $imageinfoo1=Product::where('id',$id)->value('product_img');;
        return view('admin.editimageproduct',compact('imageinfoo','imageinfoo1'));
}
public  function  UpadteImageProduct(Request $request){
    $request->validate([


        'product_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg',


    ]);
    $img=$request->file('product_img');
    $imag_name=hexdec(uniqid()).".".$img->getClientOriginalName();
    $request->product_img->move(public_path("upload"),$imag_name);
    $img_url='upload/'. $imag_name;
    $id=$request->id;
  Product::findOrFail($id)->update([
      'product_img'=>$img_url,
  ]);
    return redirect()->route('allproducts')->with('message','product update Successfully');

}
public  function  EditProduct($id){
    $categorys=Category::latest()->get();
    $subcategorys=Subcategory::latest()->get();

    $infoproduct=Product::findOrFail($id);
        return view('admin.editproduct',compact('infoproduct','categorys','subcategorys'));
}

public  function UpadteProduct(Request $request){
    $request->validate([
        'product_name' => 'required|unique:products',
        'price' => 'required',
        'quntiti' => 'required',
        'product_short_description' => 'required',
        'product_long_description' => 'required',



    ]);

    $category_id=$request->product_category_name;
    $subcategory_id=$request->product_subcategory_id;

    $category_name=Category::where('id',$category_id)->value('category_name');
    $subcategory_name=Subcategory::where('id',$subcategory_id)->value('subcategory_name');

    Product::where('id',$request->idproduct)->update([
        'product_name'=>$request->product_name,
        'product_short_description'=>$request->product_short_description,
        'product_long_description'=>$request->product_long_description,
        'price'=>$request->price,
        'product_category_name'=>$category_name,
        'product_subcategory_name'=>$subcategory_name,
        'product_category_id'=>$category_id,
        'product_subcategory_id'=>$subcategory_id,

        'quntiti'=>$request->quntiti,
        'slug'=>strtolower(str_replace('','-',$request->product_name)),


    ]);


    return redirect()->route('allproducts')->with('message','product update Successfully');


}
public  function  DeleteProduct($id){


    $category_id=Product::where('id',$id)->value('product_category_id');
    $subcategory_id=Product::where('id',$id)->value('product_subcategory_id');

    Category::where('id',$category_id)->decrement('product_count',1);

    Subcategory::where('id',$subcategory_id)->decrement('product_count',1);
    Product::findOrFail($id)->delete();
    return redirect()->route('allproducts')->with('message','product delete Successfully');


}
}
