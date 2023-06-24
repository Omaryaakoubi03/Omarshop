<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Message;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index(){
        $pendingorders=Order::where('status','pending')->latest()->get();

        return view('admin.pendingorders',compact('pendingorders'));
    }
    public function allorders(){
        $pendingorders=Order::latest()->get();

        return view('admin.allorders',compact('pendingorders'));
    }
public function DeleteOrders ($id){
    $pendingorders=Order::where('user_id',$id)->update([

        "status"=>"done"
    ]);
    return redirect()->route('pendingorder')->with('message','item approuve succsefuly');


}
public function Showmessage(){
    $messagee=Message::latest()->get();

    return view('admin.message',compact('messagee'));
}

}
