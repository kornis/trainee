@extends('front.template')

@section('title','Crear Post')

@section('top')
<h5><strong>PROYECTO SLACK-TRAINEE</strong></h5>
@endsection

@section('body')
<div class="card-header">
	CREANDO POSTEO
</div>
<div class="card-body">
<form method="post" action="{{ action('post_controller@store') }}">
	{{ csrf_field() }}
  <div class="form-group">
    <label for="title">Titulo del post</label>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="form-group">
    <textarea class="form-control" name="content" rows="6"></textarea>
  </div>
  <div class="form-group">
    <select name="topic_id" class="form-control">
      @foreach ($topics as $topic)
        <option value='{{$topic->id_topic}}'>{{$topic->name_topic}}</option>  
      @endforeach
    </select>
  </div>
    <div class="form-group">
    <label for="tags">TAGS: </label>
    <input type="text" name="tags" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Postear</button>
</form>
</div>
@endsection