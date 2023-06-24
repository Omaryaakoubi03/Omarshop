<?php

namespace App\Http\Controllers;

use App\Events\emailorder;
use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Chopinginfo;
use App\Models\Order;
use App\Models\Product;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use mysql_xdevapi\Table;
use App\Events\MessageSent;

use Srmklive\PayPal\Services\ExpressCheckout;

class ClientController extends Controller
{
    public  function CategoryPage($id){
        $categoryname=Category::where('id',$id)->value('category_name');
        $product_count=Category::where('id',$id)->value('product_count');
        $product=Product::where('product_category_id',$id)->latest()->get();
        return view('user.category',compact('categoryname','product_count','product'));
    }
    public  function  OmarshopProduct($id){
        $product=Product::findOrFail($id);
        $subcat_id=Product::where('id',$id)->value('product_subcategory_id');
        $related_product=Product::where('product_subcategory_id',$subcat_id)->latest()->get();
        return view('user.omarshopproduct',compact(['product','related_product']));
    }
    public function  Checkout(){
        $userid=Auth::id();
        $cart=Cart::where('user-id',$userid)->latest()->get();
        $number=Chopinginfo::where('user-id',$userid)->value('phonenumber');
        $city=Chopinginfo::where('user-id',$userid)->value('name_city');
        $codepostal=Chopinginfo::where('user-id',$userid)->value('code_postal');

        return view('user.checkout' ,compact('cart','number','city','codepostal'));
    }
    public  function  GetSppingAdrese(){
        return view('user.sppingadresse');

    }
    public  function  PlaceOrder(){
        $productnamee="";
        $userid=Auth::id();
        $username=Auth::user()->name;
        $email=Auth::user()->email;
        $cart=Cart::where('user-id',$userid)->latest()->get();
        $number=Chopinginfo::where('user-id',$userid)->value('phonenumber');
        $city=Chopinginfo::where('user-id',$userid)->value('name_city');
        $codepostal=Chopinginfo::where('user-id',$userid)->value('code_postal');
      foreach ($cart as $carte ){
          $productname=Product::where('id',$carte->product_id)->value('product_name');
          $productnamee= $productname;
          Order::insert([
              'shpping_number'=>$number,
              'user_id'=>$userid,
              'shpping_city'=>$city,
              'shpping_codepostal'=>$codepostal,
              'product_name'=>$productname,
              'qunatiti'=>$carte->quntity,
              'totalprice'=>$carte->price


          ]);
          $id=$carte->id;
          Cart::findOrFail($id)->delete();
      }



      // send message about order

Event::dispatch(new emailorder());

        return redirect()->route('pendingordrs')->with('message','your ordre has ben  sucssfuly');




    }
    public  function  AddSppingAdrese(Request $request){

        Chopinginfo::insert([
            'phonenumber'=>$request->phonenumber,
            'user-id'=>Auth::id(),
            'name_city'=>$request->name_city,
            'code_postal'=>$request->code_postal

        ]);
        //Product::where('id',$request->product_id)->decrement('quntiti',1);
        return redirect()->route('checkout');

    }

    public  function  UserProfile(){
        return view('user.userprofile');

    }
    public  function  NewRelease(){
        return view('user.newrelease');

    }
    public  function  TodaysDeal(){

        return view('user.todaysdeal');

    }



    public  function  TodaysDealstore(){

        return response('hellow');

    }
    public  function  CustomService(){
        return view('user.customservice');

    }
    public function PendingOrders (){
        $pendingorders=Order::where('status','pending')->latest()->get();



        return view('user.pendingorders',compact('pendingorders'));

    }

    public  function  History(){

        $pendingorderss=Order::latest()->get();

        Cache::put('my_key', $pendingorderss,10);

        $pendingorders=Cache::get('my_key');
        return view('user.history',compact('pendingorders'));

    }
    public  function  AddToCart(){
        $userid=Auth::id();
        $category=Cart::where('user-id',$userid)->latest()->get();
        return view('user.addtocart',compact('category'));
    }
    public  function  AddProductToCart(Request $request){
        $price=$request->price;
        $quntity=$request->quntiti;
        $pricet=$price * $quntity;
        Cart::insert([
            'product_id'=>$request->product_id,
            'user-id'=>Auth::id(),
            'quntity'=>$request->quntiti,
            'price'=>$pricet

        ]);
        //Product::where('id',$request->product_id)->decrement('quntiti',1);
        return redirect()->route('addtocart')->with('message','item add to cart sucssfuly');
    }
    public  function  RemovCart($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message','item remove from cart sucssfuly');


    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('newrelease');

    }

    public function Payment()
    {
        $toal=0;





        $data = [];
        $data['items'] = [
            [
                'name' => 'total product',
                'price' => 100,
                'desc'  => 'Macbook pro 14 inch',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.sucses');
        $data['cancel_url'] = route('pyment.cancel');
        $data['total'] = 100;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    public function Cancel()
    {
        dd('Your payment is canceled.');
    }

    public function Success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

           Order::where('status','pending')->delete();
           return redirect()->route('pendingordrs')->with('message','Your payment was successfully.');

        }

        dd('Please try again later.');
    }










    public function Createmessage(Request $request)
    {
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'email'=>'email|required',
            'message'=>'required|min:10|max:200',
            'subject'=>'string|required',
            'phone'=>'numeric|required'
        ]);
        // return $request->all();

        $message=Message::create($request->all());
            // return $message;
         return redirect()->back()->with('message','you send message suscfuly ');
    }


}
