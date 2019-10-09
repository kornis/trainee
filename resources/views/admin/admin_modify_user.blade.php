@extends('front.template')

@section('title','Administracion usuarios')

@include('front.partials.buttons')

@section('body')
<div class="card-header">
	<span>Administracion de usuario</span>
</div>
<div class="card-body">
	<form method="post" action="{{route('store_modified_user',$user->id_user)}}" >
    {{ csrf_field() }}
		<div class="form-group">
			<input name="name_user" type="text" class="form-control" value="{{$user->name_user}}">
		</div>

		<div class="form-group">
			<input name="email_user" type="text" class="form-control" value="{{$user->email_user}}">
		</div>
		
		<div class="form-group">
			<label for="type_user">Tipo de Usuario</label>
			<select name="type_user" class="form-control" >
                <option disabled selected>Elija una opcion...</option>
				<option>Administrador</option>
                <option>Moderador</option>
                <option>Miembro</option>
            </select>
		</div>

		<div class="form-group">
			<label for="ban">Bloquear Usuario</label>
			<select name="ban" class="form-control" >
                <option>false</option>
                <option>true</option>
            </select>
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
