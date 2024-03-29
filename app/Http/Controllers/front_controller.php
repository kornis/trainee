<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Comment;
use App\Topic;

class front_controller extends Controller
{
    public function showPosts()
    {
        $topics = Topic::topics()->get();
    	return redirect()->route('posts');
    }

    public function singlePost($id)
    {
    	$post = Article::find($id);
        $topic = $post->topic->name_topic;
        $post_user = User::find($post->user_id)->only('id_user','name_user','type_user');
    	$comments = Comment::where('article_id',$post->id_article)->join('tb_users','id_user','=','user_id')->select('tb_users.name_user','tb_users.type_user','tb_comments.*')->get();
  
    	return view('front.view_post')->with('post',$post)->with('comments',$comments)->with('user',$post_user);
    		
    }
}
