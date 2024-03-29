<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class topic_controller extends Controller
{
    public function store(Request $request)
    {
    	$topic = new Topic();
    	$topic->name_topic = $request->name_topic;
    	$topic->save();
    	return redirect()->route('posts');
    }

    public function create()
    {
    	return view('admin.create_topic');
    }

    public function show($id)
    {
        $topic = Topic::find($id);
        $posts = $topic->article;
        return view('front.posts')->with('posts',$posts)->with('topic',$topic);
        //return view('front.topics_view')->with('topics',$topics);
    }


}
