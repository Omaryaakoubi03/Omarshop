<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function  Index(Request $request){

        $query = $request->serch;
        $allproduct= Product::where('product_name', 'LIKE', "%$query%")->get();
        return view('user.home',compact('allproduct'));

    }
}
