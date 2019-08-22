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
<form method="post" action="{{ action('User_controller@login') }}">
				{{ csrf_field() }}
  <div class="form-group">
<label for="name">Nombre</label>
	<input type="text" name="name" class="form-control" placeholder="Ingrese nombre">
  </div>

  <button type="submit" class="btn btn-primary">Ingresar</button>
</form>
</div>


@endsection 








