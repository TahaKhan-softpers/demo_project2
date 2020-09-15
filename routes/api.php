<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//default starter route is api/ then all these route starts
Route::prefix('/')->middleware('auth:sanctum')->group(function () {
    Route::get('/user', 'ApiControllers\UserController@index');
    Route::get('/user/{id}', 'ApiControllers\UserController@show');
    Route::post('/user/create', 'ApiControllers\UserController@store');
    Route::get('/post', 'ApiControllers\PostController@index');
    Route::get('/post/{id}', 'ApiControllers\PostController@show');
    Route::get('/logout', 'ApiControllers\LoginController@logout');


});
Route::post('/login', 'ApiControllers\LoginController@login');





