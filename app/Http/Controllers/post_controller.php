<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class post_controller extends Controller
{

	public function create()
	{
		return view('admin.create_post');
	}


    public function store(Request $request)
    {
    	$post = new Article();
    	$name_user = session()->get('name_user');
    	$user = User::where('name_user',$name_user)->get();
    	$post->title_article = $request->title;
    	$post->content_article = $request->content;
    	$post->user_id = $user[0]->id_user;
    	$post->save();


    	return redirect()->route('posts');
    }

    public function index()
    {
    	$posts = Article::All();
    	return view('front.posts')->with('posts',$posts);
    }


}
