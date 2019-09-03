<?php

namespace App\Http\View\Composers;

//use Illuminate\View\View;
use Illuminate\Contracts\View\View;
use App\Topic;
use App\Tag;

class TopicsComposer
{
	public function compose(View $view)
	{
		$tags = Tag::All();
		$topics = Topic::All();
		$view->with('topics',$topics)->with('tags',$tags);
	}
}