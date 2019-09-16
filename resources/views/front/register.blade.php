@extends('front.template')

@section('title','REGISTRARSE')

@section('top')
<h5><strong>PROYECTO SLACK-TRAINEE</strong></h5>
@endsection

@section('body')
<div class="card-header">
	Registrar nuevo usuario
</div>
<div class="card-body">
<form method="post" action="{{ route('register') }}">
				{{ csrf_field() }}
  <div class="form-group">
	<label for="name">Nombre</label>
	<input type="text" name="name" class="form-control">
  </div>

  <div class="form-group">
	<label for="email">Email</label>
	<input type="text" name="email" class="form-control" placeholder="example@example.com">
  </div>
  <div class="form-group">
	<label for="password">Contraseña</label>
	<input type="password" name="password" class="form-control" placeholder="********">
  </div>
  <button type="submit" class="btn btn-primary">Registrarse</button>
	<small><span class="">Ya tiene usuario?</span><a href="{{route('user.login')}}"> Click Aquí</a></small>
</form>
</div>


@endsection 