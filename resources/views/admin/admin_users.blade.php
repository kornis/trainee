@extends('front.template')

@section('title','Administrador de Usuarios')

@include('front.partials.buttons')

@section('body')
<div class="card-header">
	Administracion de usuarios
</div>
<div class="card-body">
	<ul class="list-group">
	@foreach ($users as $user)
	<li class="list-group-item">
		{{$user->name_user}} <a href="{{route('admin_user',$user->id_user)}}"><span class="btn btn-warning">Editar usuario</span></a>	
	</li>
	@endforeach
	</ul>
</div>


@endsection