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
		<li class="list-group-item"><label>Tipo de Usuario: {{$user->name_user}}</label></li>
	</ul>
	<form method="post" action="{{action('image_controller@update_avatar',$user->id_user)}}" enctype="multipart/form-data">
		{{ csrf_field() }}
			{{-- <input name="_method" type="hidden" value="PUT"> --}}
			
				
				<img src="{{asset('/avatars/'.$user->avatar)}}">
				
		
			 
		<input class="" type="file" name="avatar">
		<a href=""><button type="submit" class="btn btn-warning">Modificar Datos</button></a>	
	</form>
	
</div>

@endsection
