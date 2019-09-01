@extends('front.template')

@section('title','TOPICS - LIST')

@include('front.partials.buttons')

@section('body')
<div class="card-header">
	<p>TOPIC - {{$topics->name_topic}} </p>
</div>
  @foreach ($topics->article as $article)

	<div class="card" style="margin-top: 15px">
		<div class="card-header">
			<a href="{{route('view_post', $article->id_article)}}"><span>TITULO: {{$article->title_article}}</span></a>
		</div>
		<div class="card-body">
			{{$article->content_article}}
		</div>
		

			{{-- @if(isset($tag->name_tag)) --}}
		  <div class="card-footer"> TAGS: @foreach ($article->tag as $tag) <a href="{{action('tag_controller@show',$tag->id_tag)}}"> <span class="badge badge-primary">{{$tag->name_tag}}</span></a>@endforeach</div>
		{{-- @endif --}}
		

		
		
	</div>
	
@endforeach 


@endsection