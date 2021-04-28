<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

    



}
