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
    	$name_user = session()->get('name_user');
    	$user = User::where('name_user',$name_user)->get();
    	$comment->title_comment = $request->title_comment;
    	$comment->content_comment = $request->content_comment;
    	$comment->user_id = $user[0]->id_user;
 		$comment->article_id = $id_post;
    	$comment->save();
    	return redirect()->route('view_post',$id_post);
    }
}
