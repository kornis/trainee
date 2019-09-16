@extends('front.template')

@section('title','INGRESAR')

@section('top')
<h5><strong>PROYECTO SLACK-TRAINEE</strong></h5>
@endsection

@section('body')
<div class="card-header">
	INGRESO DE USUARIO
</div>
<div class="card-body">
	@if (isset($success))
	
	{!! $success !!}

@endif
<form method="post" action="{{ action('User_controller@login') }}">
				{{ csrf_field() }}
  <div class="form-group">
	<label for="name">Email</label>
	<input type="text" name="email" class="form-control" placeholder="example@example.com">
  </div>
  <div class="form-group">
	<label for="password">Contraseña</label>
	<input type="password" name="password" class="form-control" placeholder="********">
  </div>
  <button type="submit" class="btn btn-primary">Ingresar</button>
	<small><span class="">Registrar nuevo usuario?</span><a href="{{route('user.register')}}"> Click Aquí</a></small>
</form>
</div>


@endsection 








