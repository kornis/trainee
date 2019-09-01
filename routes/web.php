<?php

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

Route::get('/',[
'as' => 'index',
'uses' => 'User_controller@index'
]);

Route::get('/logout',['as'=>'logout','uses'=>'User_controller@logout']);


Route::post('/ingresar',
[
	'uses' => 'User_controller@login',
	'as' => 'user.login'
]); 

Route::get('/posteos',[
'as' => 'posts',
'uses' => 'post_controller@index'
]);

Route::get('/crear-post',['as'=>'create_post','uses'=>'post_controller@create']);

Route::post('/post-creado',['as'=>'store_post','uses'=>'post_controller@store']);

Route::post('/comentar/{id}', ['as' => 'store', 'uses'=>'comment_controller@store']);

Route::get('/view/{id}',['as'=>'view_post','uses'=>'front_controller@singlePost']);

Route::resource('/topic','topic_controller',['only'=>['create','store','show']]);

Route::resource('/tags','tag_controller',['only'=>['create','store','show']]);
