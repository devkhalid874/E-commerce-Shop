<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\User;

use App\Models\Cart;
use App\Models\Order;


use Stripe;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $user = User::where('usertype','user')->get()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $status = Order::where('status','deliverd')->get()->count();

        return view('admin.index',compact('user','product','order','status'));
    }

    public function home(){

        $product = Product::all();

        if(Auth::id())
        {

            $user = Auth::user();

            $userid = $user->id;    // and here we get user id who is logged in
    
            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        }

     

        return view('home.index',compact('product','count'));
    }


    public function shop(){
        

        $product = Product::all();

        if(Auth::id())
        {

            $user = Auth::user();

            $userid = $user->id;    // and here we get user id who is logged in
    
            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        } 
         
        return view('home.shop',compact('product','count'));
        

    }

    public function whyus(){
       

        if(Auth::id())
        {

            $user = Auth::user();

            $userid = $user->id;    // and here we get user id who is logged in
    
            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        } 
         
        return view('home.whyus',compact('count'));
    }

    public function testimonial(){

        if(Auth::id())
        {

            $user = Auth::user();

            $userid = $user->id;    // and here we get user id who is logged in
    
            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        } 
         
        return view('home.testimonial',compact('count'));

    }

    public function contactus(){

        if(Auth::id())
        {

            $user = Auth::user();

            $userid = $user->id;    // and here we get user id who is logged in
    
            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        } 
         
        return view('home.contactus',compact('count'));

    }

    public function login_home(){

        $product = Product::all();

        if(Auth::id())
        {

            $user = Auth::user();

            $userid = $user->id;    // and here we get user id who is logged in
    
            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        }

        return view('home.index',compact('product','count'));
    }

    public function product_details($id){

        $data = Product::find($id);

        if(Auth::id())
        {

            $user = Auth::user();

            $userid = $user->id;    // and here we get user id who is logged in
    
            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        }

        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id){

        $product_id = $id;    // this is product id 
        
        $user = Auth::user();

        $user_id = $user->id;    // and here we get user id who is logged in

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        flash()->success('Product Added to the Cart.');

        return redirect()->back();

    }

    public function mycart(){
        
        if(Auth::id()){

            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();  // It only get the data which id is loggedin.
        }

        return view('home.mycart',compact('count','cart'));
    }

    public function remove_cart($id){
        $data = Cart::find($id);

      if($data){     
 
        $data->delete();
 
        flash()->success('Cart Deleted Successfully!');
        }else{
            flash()->error('Cart Item not found.');
        }
 
        return redirect()->back();
    
}
  
   public function confirm_order(Request $request){

    $name = $request->name;
    $address = $request->address;
    $phone = $request->phone;

    $userid = Auth::user()->id;   // this way we get loggedin user id.

    $cart = Cart::where('user_id',$userid)->get();

    foreach($cart as $carts){

        $order = new Order;
        $order->name = $name;
        $order->rec_address = $address;
        $order->phone = $phone;

        $order->user_id = $userid;
        $order->product_id = $carts->product_id;

        $order->save();
    
    }

    $cart_remove = Cart::where('user_id',$userid)->get();

    foreach($cart_remove as $remove){
        
        $data = Cart::find($remove->id);

        $data->delete();
    }

    flash()->success('Order Placed Successfully!');

    return redirect()->back();
   }

   public function myorders(){

    $user = Auth::user()->id;

    $count = Cart::where('user_id',$user)->get()->count();

    $order = Order::where('user_id',$user)->get(); 

    return view('home.order',compact('count','order'));
   }


   public function stripe()

   {

       return view('home.stripe');

   }

   public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment Completed" 
        ]);
        flash()->success('Order Placed Successfully!');
        return back();
    }
}