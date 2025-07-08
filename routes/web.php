<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function(){

    return view('login');

});

Route::post('/login',[userController::class ,'login']);
Route::get('/',[ProductController::class ,'index']);//->middleware('userAuth');
