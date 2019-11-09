@extends('front.template')

@section('title','El Post')

@section('top')
@include('front.partials.buttons')
@endsection

@section('body')

<div class="card-header">
	<strong>TITULO:</strong> {{$post->title_article}}
</div>
<div class="card-body">
	{{$post->content_article}}
</div>

<div class="card">
	<div class="card-body">
	 
		@if(Auth::user()) 
		@if(Auth::user()->type_user == "Admin" || Auth::user()->type_user == "Miembro" || Auth::user()->type_user == "Moderador" ) 
		
		
<form method="post" action="{{action('comment_controller@store',$post->id_article)}}">
	{{ csrf_field() }}
  <div class="form-group">
  	<label for="title_comment"><strong>TITULO COMENTARIO:</strong></label>
  	<input type="text" name="title_comment" class="form-control">
  </div>
  <div class="form-group">
    <textarea class="form-control" name="content_comment" rows="4"></textarea>
  </div>
  <button type="submit" class="btn btn-success">ENVIAR COMENTARIO</button>
</form>
		


@endif
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
	<span><strong>Comentario de: </strong><a href="{{route('view_user',$comment->user_id)}}"> {{$comment->name_user}}</strong></a></span>
	@if($comment->type_user == 'Admin')
	<span class="badge badge-danger">Admin</span>
	@endif
	@if($comment->type_user == 'Moderador')
	<span class="badge badge-primary">Mod</span>
	@endif
	<span> - Título: {{$comment->title_comment}}</span>
	<span style="float: right;"> Comentado: {{$comment->created_at}}</span>
	<span style="float: right;"> @if(Auth::user())
	@if(Auth::user()->id_user == $comment->user_id || Auth::user()->type_user == 'Admin' || Auth::user()->type_user == 'Moderador')
	
		<a href="{{route('edit_comment',$comment->id_comment)}}"><span class="badge badge-primary">Editar</span></a>
		<a href="{{route('delete_comment',$comment->id_comment)}}"><span class="badge badge-danger">Eliminar</span></a>
	
	</span>
	@endif @endif 
	
	</div>
	<div class="card-body">
		{{$comment->content_comment}}
	</div>
</div>

@endforeach
@endsection

