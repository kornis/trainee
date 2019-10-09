@extends('front.template')
@include('front.partials.buttons')
@section('body')

	<div class="card-header">
	<span>Perfil de usuario</span>
</div>
<div class="row">
	<div class="col-md-1">
<img src="{{asset('/avatars/'.$user->avatar)}}" style="border-radius: 50%;max-width: 150px;border: 1px solid gray;margin-top: 20px">
</div>
	<div class="col-md-11">
<div class="card-body">
	<ul class="list-group">
		<li class="list-group-item"><label>Nombre: {{$user->name_user}}</label></li>
		<li class="list-group-item"><label>Email: {{$user->email_user}}</label></li>
		<li class="list-group-item"><label>Tipo de Usuario: {{$user->type_user}}</label></li>
	</ul>
</div>
</div>

</div>

@endsection