@extends('front.template')

@section('title','Administracion usuarios')

@include('front.partials.buttons')

@section('body')
<div class="card-header">
	<span>Administracion de usuario</span>
</div>
<div class="card-body">
	<p>Modificar datos de usuario</p>
	<form action="" method="post">
		<div class="form-group">
			<input name="name_user" type="text" class="form-control" value="{{$user->name_user}}">
		</div>

		<div class="form-group">
			<input name="email_user" type="text" class="form-control" value="{{$user->email_user}}">
		</div>
		
		<div class="form-group">
			<label for="password_user">Nueva Contraseña</label>
			<input name="password_user" type="password" class="form-control" placeholder="********">
		</div>
		<button type="submit" class="btn btn-success">Enviar Datos</button>

	</form>

	<form method="post" action="{{route('update_avatar',$user->id_user)}}" enctype="multipart/form-data">
		{{ csrf_field() }}
			{{-- <input name="_method" type="hidden" value="PUT"> --}}

				<img src="{{asset('/avatars/'.$user->avatar)}}" style="border-radius: 50%; max-width: 150px;border: 1px solid gray;">
			
			
		<input class="" type="file" name="avatar" required>
		<button type="submit" class="btn btn-warning">Modificar Imagen</button>
	</form>
	
</div>

@endsection

