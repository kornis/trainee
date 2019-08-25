@extends('front.template')

@section('title','Creando Topics')

@section('body')

<div class="card-header">
	<p>Nuevo Topic</p>
</div>

<div class="card-body">
	<form method="post" action='{{action('topic_controller@store')}}'>
		{{ csrf_field() }}
	<div class="form-group">
		<label for="name_topic">Nombre del topic</label>
		<input type="text" name="name_topic" class="form-control">
	</div>
	<button type="submit" class="btn btn-success">CREAR</button>
</form>
</div>

@endsection