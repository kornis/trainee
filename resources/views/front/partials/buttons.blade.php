<div class="text-center" style="padding: 8px;   margin-right: auto; margin-left: auto;">
	<h5><strong>PROYECTO SLACK-TRAINEE</strong></h5>
<a href="{{route('posts')}}"><span class="btn btn-warning">INICIO</span></a>
@if (Auth::user())
<a href="{{action('post_controller@create')}}"><span class="btn btn-primary">Crear Posteo</span></a>
@if(Auth::user()->type_user == 'Admin'|| Auth::user()->type_user == 'Moderador' )
<a href="{{action('topic_controller@create')}}"><span class="btn btn-success">Crear Topic</span></a>
@endif
<a href="{{route('watch_profile')}}"><span class="btn btn-primary">Perfil</span></a>
@if (Auth::user()->type_user == 'Admin')
	<a href="{{route('admin_users')}}"><span class="btn btn-warning">Administrar</span></a>
@endif
<a href="{{action('User_controller@logout')}}"><span class="btn btn-danger">DESLOGUEARSE</span></a>
@endif


@if (!Auth::user())
	<a href="{{route('login')}}"><span class="btn btn-primary">INICIAR SESION</span></a>
@endif

</div>
{{-- <div><img src="{{asset('/avatars/'.$user->avatar)}}" style="border-radius: 50%; height: 15px;">  <span style="padding: 5px 10px;">{{session('user')}}</span></div> --}}