<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Topic;
use App\Tag;

class post_controller extends Controller
{

	public function create()
	{
        $topics = Topic::All();
		return view('admin.create_post')->with('topics',$topics);
	}


    public function store(Request $request)
    {
    	$post = new Article();
    	$name_user = session()->get('name_user');
    	$user = User::where('name_user',$name_user)->get();
    	$post->title_article = $request->title;
    	$post->content_article = $request->content;
    	$post->user_id = $user[0]->id_user;
        $post->topic_id = $request->topic_id; 
        $post->save();
        $post_tag = Article::find(intval($post->id_article));
        $tags = explode(";",$request->tags);
        foreach($tags as $item)
        {
            try
            {
                $test = Tag::where('name_tag',$item)->first(); 
                if($test != null)
                {
                   $post_tag->tag()->sync([$test->id_tag]); 
                }  
                else
                {
                $tag_o = new Tag();
                $tag_o->name_tag = $item;
                $post_tag->tag()->save($tag_o);  
                }            
                
            }
            catch(\Illuminate\Database\QueryException $e)
            {
               $tag_o = new Tag(['name_tag'=>$item]);
               $post_tag->tag()->save($tag_o);
            }
        }
        
    	return redirect()->route('posts');
    }

    public function index()
    {
    	$posts = Article::orderBy('updated_at','desc')->get();
        
        
    	return view('front.posts')->with('posts',$posts);
    }


}
