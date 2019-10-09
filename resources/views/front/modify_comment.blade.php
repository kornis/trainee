@extends('front.template')

@section('title','Modificar comentario')

@include('front.partials.buttons')

@section('body')

<form method="post" action="{{action('comment_controller@update_comment',$comment->id_comment)}}">
	{{ csrf_field() }}
  <div class="form-group">
  	<label for="title_comment">TITULO COMENTARIO:</label>
  	<input type="text" name="title_comment" class="form-control" value="{{$comment->title_comment}}">
  </div>
  <div class="form-group">
    <textarea class="form-control" name="content_comment" rows="4">{{$comment->content_comment}}</textarea>
  </div>
  <button type="submit" class="btn btn-success">ENVIAR COMENTARIO</button>
</form>