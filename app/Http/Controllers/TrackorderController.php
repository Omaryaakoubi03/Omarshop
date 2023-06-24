<?php

namespace App\Http\Controllers;

use App\Models\Trackorder;
use Illuminate\Http\Request;

class TrackorderController extends Controller
{
    public function sendTrackorder(Request $request){
        $request->validate([
            'order_number'=>'required'
        ]);
        Trackorder::insert([
            'order_number'=>$request->order_number
        ]);
        return redirect()->route('newrelease')->with('message',"you track order sucssfuly");

    }
}
