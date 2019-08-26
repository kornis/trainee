<?php

namespace App\Http\View\Composers;

//use Illuminate\View\View;
use Illuminate\Contracts\View\View;
use App\Topic;

class TopicsComposer
{
	public function compose(View $view)
	{
		$topics = Topic::All();
		$view->with('topics',$topics);
	}
}