@extends('front.template')

@section('title','POSTEOS')

@section('top')

<h5><strong>PROYECTO SLACK-TRAINEE</strong></h5>

@include('front.partials.buttons')

@endsection

@section('body')
<div class="container">
<div class="row">
<div class="col-md-9">
<div class="card-header">
	<p>Ultimos posteos</p>
</div>
<div class="card-body">


@foreach ($posts as $post)
	<div class="card">
	<div class="card-header">
		<span>TITULO: <a href="{{route('view_post', $post->id_article)}}"> {{$post->title_article}}</a></span><span></span>
	</div>
	<div class="card-body">
		{{$post->content_article}}
		
	</div>
	<div><hr><span>Última actualización: </span>{{$post->updated_at}}<span style="float: right;">  TOPIC: <a href="">{{$post->topic->name_topic}} </a></span></div>
	</div>
@endforeach
</div>
</div>
	@include('front.partials.topics')
</div>
</div>

@endsection
