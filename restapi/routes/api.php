<?php

use Illuminate\Http\Request;

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

//List user
Route::get('users','UserController@index');

//List single user
Route::get('user/{id}','UserController@show');

//Create new user
Route::post('user','UserController@store');

//Update user
Route::put('user/{id}','UserController@update');

//Delete user
Route::delete('user/{id}','UserController@destroy');