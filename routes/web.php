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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/')->middleware('auth')->group(function () {

    //MAIN VIEW FOR PAGE
    Route::get('/mainview', function () {
        return view('frontend/modules/index');
    })->withoutMiddleware('auth');
    //Routes that are used for user
    Route::resource('/user', 'UserController');
    //Routes that are used for comment
    Route::resource('/comment', 'CommentController');
    //Routes that area used for image
    Route::resource('/image', 'ImageController');

});

//this is post routes
Route::prefix('post')->middleware('auth')->group(function () {

    Route::get('/', 'PostController@index');
    Route::get('/show/{id}', 'PostController@show');
    Route::get('/create/', 'PostController@create');
    Route::post('/store/', 'PostController@store');
    Route::get('/edit/{id}', 'PostController@edit');
    Route::post('/update/{id}', 'PostController@update');
    Route::get('/delete/{id}', 'PostController@destroy');

});


//this is comment routes
//Route::prefix('comment')->group(function () {
//
//    Route::get('/', 'CommentController@index');
//    Route::get('/show/{id}', 'CommentController@show');
//    Route::get('/create/','CommentController@create');
//    Route::post('/store/','CommentController@store');
//    Route::get('/edit/{id}','CommentController@edit');
//    Route::post('/update/{id}','CommentController@update');
//    Route::get('/delete/{id}','CommentController@destroy');
//
//});


//Route::view('/Welcomehome','index',['name'=>'Khan']);

//this is user routes
//Route::prefix('user')->group(function () {
//
//    Route::get('/', 'UserController');
//    Route::get('/show/{id}', 'UserController@show');
//    Route::get('/create/','UserController@create');
//    Route::post('/store/','UserController@store');
//    Route::get('/edit/{id}','UserController@edit');
//    Route::post('/update/{id}','UserController@update');
//    Route::get('/delete/{id}','UserController@destroy');
//
//});


