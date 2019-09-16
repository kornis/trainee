<?php

namespace App\Http\Controllers;
use App\Comment;
use App\User;

use Illuminate\Http\Request;

class comment_controller extends Controller
{
    public function create()
    {

    }

    public function store(Request $request,$id_post)
    {
    	$comment = new Comment();
        $id_user = session('user')->id_user;
    	$user = User::where('id_user',$id_user)->first();
    	$comment->title_comment = $request->title_comment;
    	$comment->content_comment = $request->content_comment;
    	$comment->user_id = $user->id_user;
 		$comment->article_id = $id_post;
    	$comment->save();
    	return redirect()->route('view_post',$id_post);
    }
}
