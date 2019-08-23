<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Comment;

class front_controller extends Controller
{
    public function showPosts()
    {
    	return redirect()->route('posts');
    }

    public function singlePost($id)
    {
    	$post = Article::find($id);
    	$comments = Comment::where('article_id',$post->id_article)->join('tb_users','id_user','=','user_id')->select('tb_users.name_user','tb_comments.*')->get();
  
    	return view('front.view_post')->with('post',$post)->with('comments',$comments);
    		
    }
}