<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;


class tag_controller extends Controller
{
    public function store($array)
    {
    	$tag_list = Tag::All();
    	foreach($array as $tag)
    	{
	    	if(!in_array($tag,$tag_list))
	    	{
	    		$tag = new Tag();
	    		$tag->name_tag = $array;
	    		$tag->save();
	    	}    	
	    }	
    }

    public function show($id)
    {
    	$post_tag = Tag::find($id);
    	
    	$posts = $post_tag->article;
    	return view('front.posts')->with('posts',$posts)->with('tag',$post_tag);
    }
}
