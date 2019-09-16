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

Route::get('/login',function(){
	if(session('user')=="")
	{
		return view('front.login');
	}
	else
	{
		return redirect()->route('posts');
	}
})->name('login');

/*Route::get('/',[
'as' => 'index',
'uses' => 'User_controller@index'
]);*/


Route::get('/perfil/{id}','User_controller@viewProfiles')->name('view_user')->middleware('checkLogin');

Route::get('/logout',['as'=>'logout','uses'=>'User_controller@logout']);


Route::get('/ingresar', function(){
	return view('front.index');
});

Route::post('/ingresar',
[
	'uses' => 'User_controller@login',
	'as' => 'user.login'
]); 

Route::post('/registrarse',['uses'=>'User_controller@register','as'=>'register']);

Route::get('/registrarse', function(){
	return view('front.register');
})->name('user.register');

Route::get('/',[
'as' => 'posts',
'uses' => 'post_controller@index'
]);

//Route::resource('perfil','user_controller');

Route::post('/perfil',['as'=>'update_profile','uses'=>'image_controller@update_avatar'])->middleware('checkLogin');

Route::get('/perfil',['as'=>'profile','uses'=>'user_controller@profile'])->middleware('checkLogin');

Route::get('/crear-post',['as'=>'create_post','uses'=>'post_controller@create'])->middleware('checkLogin');

Route::post('/post-creado',['as'=>'store_post','uses'=>'post_controller@store'])->middleware('checkLogin');

Route::post('/comentar/{id}', ['as' => 'store', 'uses'=>'comment_controller@store'])->middleware('checkLogin');

Route::get('/view/{id}',['as'=>'view_post','uses'=>'front_controller@singlePost'])->middleware('checkLogin');

Route::resource('/topic','topic_controller',['only'=>['create','store','show']])->middleware('checkLogin');

Route::resource('/tags','tag_controller',['only'=>['create','store','show']])->middleware('checkLogin');


