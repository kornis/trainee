@extends('front.template')

@section('title','POSTEOS')

@section('top')

@include('front.partials.buttons')

@endsection

@section('body')
<div class="container">
<div class="row">
<div class="col-md-9">
<div class="card-header">
	<p>Ultimos posteos<span> @if (isset($tag))
		- Segun TAG: {{$tag->name_tag}}
	@endif
	 @if (isset($topic))
		- Segun TOPIC: {{$topic->name_topic}}
	@endif

</span></p>
</div>
<div class="card-body">


@foreach ($posts as $post)
	<div class="card" style="margin-top: 15px">
	<div class="card-header">
		<span>TITULO: <a href="{{route('view_post', $post->id_article)}}"> {{$post->title_article}}</a></span><span></span><span style="float: right;">Creado por: <a href="{{route('view_user',$post->user->id_user)}}"> {{$post->user->name_user}}</a></span>
	</div>

	<div><span>Última actualización: </span>{{$post->updated_at}}<span style="float: right;">  TOPIC: <a href="">{{$post->topic->name_topic}} </a></span></div>
	</div>
@endforeach
</div>
</div>
	@include('front.partials.topics')
</div>
</div>

@endsection
