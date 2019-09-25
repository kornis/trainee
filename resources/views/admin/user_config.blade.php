@extends('front.template')

@section('title','Panel de Usuario')

@include('front.partials.buttons')

@section('body')
<div class="card-header">
	<span>Panel de Usuario</span>
</div>
<div class="card-body">
	<ul class="list-group">
		<li class="list-group-item"><label>Nombre: {{$user->name_user}}</label></li>
		<li class="list-group-item"><label>Email: {{$user->email_user}}</label></li>
		<li class="list-group-item"><label>Tipo de Usuario: {{$user->type_user}}</label></li>
	</ul>
	<a href=""><span class="btn btn-primary">Modificar Datos</span></a>

	<form method="post" action="{{route('update_avatar',$user->id_user)}}" enctype="multipart/form-data">
		{{ csrf_field() }}
			{{-- <input name="_method" type="hidden" value="PUT"> --}}
			
				
				<img src="{{asset('/avatars/'.$user->avatar)}}" style="border-radius: 50%; max-width: 150px;border: 1px solid gray;">
				
		
			 
		<input class="" type="file" name="avatar" required>
		<a href=""><button type="submit" class="btn btn-warning">Modificar Imagen</button></a>	
	</form>
	
</div>

@endsection
