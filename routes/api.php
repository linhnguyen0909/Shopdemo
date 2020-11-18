<?php

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::get('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');
});

Route::middleware('auth:user')->group(function () {
    Route::apiresource('posts', 'PostController');

});
Route::apiResource('searchs','BookController');
Route::apiResource('users','UserController');
Route::apiResource('users.roles','UserRoleController')->only('store');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('email-test', function(){
    $to_email='hoailinholaf@gmail.com';
    dispatch(new SendEmailJob($to_email));
return 'Done';
});
