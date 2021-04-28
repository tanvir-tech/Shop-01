<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req){

        $user = User::where(['email'=>$req->email])->first();

        if(!$user || !Hash::check($req->password,$user->password)){
            
            return "Username or pass not matched";
        
        }else{

            $req->session()->put('user',$user);
            return redirect("home");

        }
    }

    function logout(Request $req){
        $req->session()->forget('user');
            return redirect("login");
    }



    function registration(Request $req){


        $user = new User;
        $user->name = $req->user;
        $user->email = $req->email;
        $user->address = $req->address;
        $user->password = Hash::make($req->password);
        $user->save();

        return redirect('login');

    }
}
