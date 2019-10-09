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

    public function update_comment(Request $request,$id_comment)
    {

        $comment = Comment::where('id_comment',$id_comment)->first();
        if(isset($comment))
        {
        $comment->content_comment = $request->content_comment;
        $comment->title_comment = $request->title_comment;
        $comment->save();
        $id_post = $comment->article_id;  

        return redirect()->route('view_post',$id_post);        
        }

        
    }

    public function view_update($id)
    {
        $comment = Comment::where('id_comment',$id)->first();
        return view('front/modify_comment')->with('comment',$comment);
    }

    public function delete_comment($id)
    {
        Comment::where('id_comment',$id)->delete();
        return redirect()->back();
    }
}
