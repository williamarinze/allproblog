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



// protected routes
Route::group(['middleware' => ['api', 'auth']], function () {

    //Authentication routes
    Route::group(['middleware' => 'api','prefix' => 'auth'],function ($router) {


       Route::post('logout','AuthController@logout');
       Route::post('refresh', 'AuthController@refresh');
       Route::post('me', 'AuthController@me');

 });
       //reset password routes
  	   Route::post('password/email', 'Auth\ForgotPasswordController@getResetToken');
       Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    
       Route::resource('users','UserController');
       Route::resource('comments','CommentController');
       Route::resource('posts','PostController');
});

//Admin routes
Route::group(['middleware' => ['api', 'admin']], function () {
     Route::delete('users/{id}', 'UserController@destroy');

});


// public routes
Route::group(['middleware' => 'api'], function ($router) {    

  Route::post('auth/login', 'AuthController@login');
  Route::post('register', 'UserController@store');

  //public posts
  Route::get('posts', 'PostController@index');
  Route::get('posts/{id}', 'PostController@show');
  Route::get('users/{id}/posts', 'UserController@show');

  //public comments
  Route::get('posts/{id}/comments', 'PostController@show');





});

