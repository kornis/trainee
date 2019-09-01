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
}
