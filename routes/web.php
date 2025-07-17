<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/logout1', function () {
 //return 'hi';
    Session::forget('user');
 return view('logout');
});

Route::get('/login', function(){

    return view('login');

});


Route::post('/login',[userController::class ,'login']);
Route::get('/',[ProductController::class ,'index']);//->middleware('userAuth');
Route::get('detail/{id}',[ProductController::class ,'detail']);//->middleware('userAuth');
Route::get('/search',[ProductController::class ,'search']);//->middleware('userAuth');
Route::post('/add_to_cart/{pid}',[ProductController::class ,'addToCart']);//->middleware('userAuth');
Route::post('/logout',[ProductController::class ,'logout123']); //->middleware('userAuth');
