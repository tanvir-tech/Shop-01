<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function showProducts(Request $req){

        $items = Product::all();

        // return $items;
        return view('/allproducts',['Products'=>$items]);

    }

    function search(Request $req){

        // return $req->input();
        $items = Product::where('name','like', '%'.$req->input('query').'%')->get();
        return view('/allproducts',['Products'=>$items]);

    }


    function detail($id){

        $item = Product::find($id);
        return view('/productDetail',['item'=>$item]);

    }


    function addToCart(Request $req){

        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('home');

        }else{
            return view('login');
        }

    }

    static function cart_Count(){
        
        $user_id = session()->get('user')['id'];
        return Cart::where('user_id', $user_id)->count();

    }

    function cartlist(Request $request){

        $userID = $request->session()->get('user')['id'];

        $items = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userID)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('/cartlist',['Products'=>$items]);
    }

    function removeCart($id){

        Cart::destroy($id);
        return redirect('cartlist');
    }

    
    function orderNow(Request $request){

        $userID = $request->session()->get('user')['id'];

        $total = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userID)
        ->select('products.*','cart.id as cart_id')
        ->sum('products.price');

        return view('ordernow',['total'=>$total]);
        //return $total;
    }

    function placeOrder(Request $req){

        $user_id = session()->get('user')['id'];
        $allcart = Cart::where('user_id',$user_id)->get();

        foreach($allcart as $cart){
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->address = $req->address;
            $order->status = 'pending';
            $order->payment_method = $req->payment_method;
            $order->payment_status = 'pending';
            $order->save();
        }
        Cart::where('user_id',$user_id)->delete();
        return redirect('home');
    }


    function orderlist(Request $req){

        $userID = $req->session()->get('user')['id'];

        $orders = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userID)
        ->get();

        //return $orders;
        return view('orderlist',['orders'=>$orders]);
    }

}
