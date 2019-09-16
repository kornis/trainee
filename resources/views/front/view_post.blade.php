@extends('front.template')

@section('title','El Post')

@section('top')
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
		@if (session('user') != "")
		
		
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
@else

	<div class="">
		<span>Para poder comentar debe iniciar sesión.  <a href="{{route('login')}}"><span class="btn btn-primary">Iniciar Sesion</span></a></span>
	</div>

@endif
</div>
</div>


@foreach ($comments as $comment)
<div class="card">
	<div class="card-header">
	<span>Comentario de: <strong>{{$comment->name_user}}</strong></span><span> - Título: {{$comment->title_comment}}</span><span style="float: right;">Comentado: {{$comment->created_at}}</span>
	</div>
	<div class="card-body">
		{{$comment->content_comment}}
	</div>
</div>

@endforeach
@endsection