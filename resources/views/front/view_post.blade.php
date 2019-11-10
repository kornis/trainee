@extends('front.template')

@section('title','El Post')

@section('top')
@include('front.partials.buttons')
@endsection
@section('body')
	

<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
	<div class="row">
		<div class="col-md-12">
			<div class="cont-post">
				<div class="titles">
					<p><strong>{{$post->title_article}}</strong></p>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="datos-user">
							<span>
									<a href="{{route('view_user',$user["id_user"])}}"> {{$user["name_user"]}}</strong></a>
							</span>
							<span>Tipo de usuario
									@if($user["type_user"] == 'Admin')
									<span class="badge badge-danger">Admin</span>
									@endif
									@if($user["type_user"] == 'Moderador')
									<span class="badge badge-primary">Mod</span>
									@endif
									@if($user["type_user"] == 'Miembro')
									<span class="badge badge-warning">User</span>
									@endif
							</span>
							<span>Posts: 12345</span>
							<span>Perfil</span>
						</div>
					</div>

					<div class="col-md-9">	
						<div class="cont">
								{{$post->content_article}}
							<hr>
						</div>
					</div>	
				</div>
			</div>
		</div>	
	</div>

<div class="card" style="margin-bottom: 10px">
	<div class="card-body item-background">
	 
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

<div class="row">
		<div class="col-md-12">
			<div class="cont-post">
				<div class="titles">
				<p id="title-comment"><strong>Re: {{$post->title_article}}: {{$comment->title_comment}}</strong></p>
				<span id="title-comment"> -  {{$comment->created_at}}</span>
					<span style="float: right;"> @if(Auth::user())
							@if(Auth::user()->id_user == $comment->user_id || Auth::user()->type_user == 'Admin' || Auth::user()->type_user == 'Moderador')
							
								<a href="{{route('edit_comment',$comment->id_comment)}}"><span class="badge badge-primary">Editar</span></a>
								<a href="{{route('delete_comment',$comment->id_comment)}}"><span class="badge badge-danger">Eliminar</span></a>
							
							</span>
							@endif @endif 
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="datos-user">
							<span>
								<a href="{{route('view_user',$comment->user_id)}}"> {{$comment->name_user}}</strong></a>
							</span>
							<span>Tipo de usuario
									@if($comment->type_user == 'Admin')
									<span class="badge badge-danger">Admin</span>
									@endif
									@if($comment->type_user == 'Moderador')
									<span class="badge badge-primary">Mod</span>
									@endif
									@if($comment->type_user == 'Miembro')
									<span class="badge badge-warning">User</span>
									@endif
							</span>
							<span>Posts: 12345</span>
							<span>Perfil</span>
						</div>
					</div>

					<div class="col-md-9">	
						<div class="cont">
								{{$comment->content_comment}}
							<hr>
						</div>
					</div>	
				</div>
			</div>
		</div>	
	</div>

	@endforeach


</div>
<div class="col-md-3">
</div>
</div>

@endsection