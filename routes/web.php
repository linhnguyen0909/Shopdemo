<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/form',function (){
   return view('form');
});
Route::post('/message/send', ['uses' => 'FrontController@addFeedback', 'as' => 'front.fb']);
Route::get("send-emails", "EmailController@sendEmailToUser");
