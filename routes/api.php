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


Route::get('/users', 'user_controller@api_getUsers');

Route::get('/posts','post_controller@api_getPosts');

Route::get('/post/{id}','post_controller@api_getSinglePost');