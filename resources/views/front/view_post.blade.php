@extends('front.template')

@section('title','El Post')

@section('top')
<h5><strong>PROYECTO SLACK-TRAINEE</strong></h5>
@include('front.partials.buttons')
@endsection

@section('body')

<div class="card-header">
	TITULO: {{$post->title_article}}
</div>
<div class="card-body">
	{{$post->content_article}}
</div>

<div class="card">
	<div class="card-body">
<form method="post" action="{{action('comment_controller@store',$post->id_article)}}">
	{{ csrf_field() }}
  <div class="form-group">
  	<label for="title_comment">TITULO COMENTARIO:</label>
  	<input type="text" name="title_comment" class="form-control">
  </div>
  <div class="form-group">
    <textarea class="form-control" name="content_comment" rows="4"></textarea>
  </div>
  <button type="submit" class="btn btn-success">ENVIAR COMENTARIO</button>
</form>
</div>
</div>
@foreach ($comments as $comment)
<div class="card">
	<div class="card-header">
	<span>Comentario de: <strong>{{$comment->name_user}}</strong></span><span>  -  Comentado: {{$comment->created_at}}</span>
	</div>
	<div class="card-body">
		{{$comment->content_comment}}
	</div>
</div>

@endforeach
@endsection