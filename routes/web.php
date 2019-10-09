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
	'as' => 'posts',
	'uses' => 'post_controller@index'
	]);




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




Route::get('/miperfil',['as'=>'watch_profile','uses'=>'user_controller@profile'])->middleware('checkLogin');

Route::post('/miperfil/update',['as'=>'update_profile','uses'=>'user_controller@store_modify'])->middleware('checkLogin');

Route::get('/miperfil/update/{id}', ['uses'=>'user_controller@update_profile'])->name('modify_profile')->middleware('checkLogin');

Route::post('/miperfil',['as'=>'update_avatar','uses'=>'image_controller@update_avatar'])->middleware('checkLogin');



Route::get('/perfil/{id}','User_controller@viewProfile')->name('view_user')->middleware('checkLogin');






Route::get('/crear-post',['as'=>'create_post','uses'=>'post_controller@create'])->middleware('checkLogin');

Route::post('/post-creado',['as'=>'store_post','uses'=>'post_controller@store'])->middleware('checkLogin');

Route::get('/view/{id}',['as'=>'view_post','uses'=>'front_controller@singlePost']);




Route::post('/comentar/{id}', ['as' => 'store', 'uses'=>'comment_controller@store'])->middleware('checkLogin');

Route::get('/dcomment/{id}', ['as'=>'delete_comment','uses'=>'comment_controller@delete_comment'])->middleware('checkLogin');

Route::post('/edit-comment/{id}',['as'=>'store_comment','uses'=>'comment_controller@update_comment'])->middleware('checkLogin');

Route::get('/edit-comment/{id}',['as'=>'edit_comment','uses'=>'comment_controller@view_update'])->middleware('checkLogin');





Route::resource('/topic','topic_controller',['only'=>['create','store','show']])->middleware('checkLogin');



Route::resource('/tags','tag_controller',['only'=>['create','store','show']])->middleware('checkLogin');




Route::get('/admin/users', ['uses'=>'user_controller@admin_user_list']
)->name('admin_users')->middleware('checkLogin');

Route::get('/admin/user/{id}',['uses'=>'user_controller@admin_user_modify','as'=>'admin_user']);

Route::post('/admin/user/{id}',['uses'=>'user_controller@admin_user_modified','as'=>'store_modified_user'])->middleware('checkLogin');

