<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Topic;
use App\Tag;
use App\Comment;


class post_controller extends Controller
{

	public function create()
	{
        $topics = Topic::All();
		return view('admin.create_post')->with('topics',$topics);
	}


//funcion (api) que retorna todos los posts creados

public function api_getPosts()
{
    $articles = Article::join('tb_users','tb_articles.user_id','=','tb_users.id_user')
    ->join('tb_topics','tb_articles.topic_id','=','tb_topics.id_topic')
    ->select('id_article','title_article','content_article','id_user','name_user','id_topic','name_topic')->get();
   if(isset($articles))
   {
    $tags = Tag::All();
    $topics = Topic::All();
    $values = array('Articles'=>$articles,'Topics'=>$topics,'Tags'=>$tags);
    return response()->json([$values],200);
   }
   else
   {
       return response()->json(['message'=>'No se ha podido acceder, en caso de continuar el error, enviar email a fedegarcia222@gmail.com'],404);
   }

}

public function api_createPost(Request $request)
{
    
}


//funcion (api) que retorna un post segun el id enviado por get

public function api_getSinglePost($id_post)
{
    $var = Article::where('id_article',$id_post)
    ->join('tb_users','tb_articles.user_id','=','tb_users.id_user')
    ->join('tb_topics','tb_articles.topic_id','=','tb_topics.id_topic')
    ->select('id_article','title_article','content_article','id_user','name_user','email_user','type_user','name_topic')->first(); 
    if(isset($var))
    {
        $tags = Tag::join('tb_article_tag','tb_article_tag.tag_id','=','tb_tags.id_tag')->select('name_tag')->where('tb_article_tag.article_id',$var->id_article)->get();
        $comments = Comment::where('article_id',$var->id_article)->join('tb_users','id_user','=','user_id')->select('tb_comments.*','tb_users.name_user','tb_users.type_user')->get();
        $post = array('Article'=>$var,'Comments'=>$comments,'Tags'=>$tags);
        return response()->json([$post],200);
    }
    else
    {
        return response()->json(['message'=>'Error, no encontrado'],402);
    }

}


    public function store(Request $request)
    {
    	$post = new Article();
    	$user = session('user');
    	$post->title_article = $request->title;
    	$post->content_article = $request->content;
    	$post->user_id = $user->id_user;
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
       
        $hola = anteriorDelTriple(6);

        
    	return view('front.posts')->with('posts',$posts);
    }


}
