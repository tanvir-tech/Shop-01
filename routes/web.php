<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

// user 
Route::post('/login',[UserController::class,'login']);

Route::get('/logout',[UserController::class,'logout']);

Route::get('/registration', function () {return view('registration');});
Route::post('/registration',[UserController::class,'registration']);

Route::get('/forgetPass', function () {return view('auth.forgetPass');});

Route::get('/resetPass', function () {return view('auth.resetPass');});

// product 
Route::get('/home',[ProductController::class,'showProducts']);

Route::get('/search',[ProductController::class,'search']);

Route::get('detail/{id}',[ProductController::class,'detail']);

Route::post('/cart',[ProductController::class,'addToCart']);

Route::get('/cartlist',[ProductController::class,'cartlist']);

Route::get('removeCart/{id}',[ProductController::class,'removeCart']);

Route::get('/orderNow',[ProductController::class,'orderNow']);

Route::post('/placeOrder',[ProductController::class,'placeOrder']);

Route::get('/orderlist',[ProductController::class,'orderlist']);

