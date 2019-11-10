<div class="buttons">
<a href="{{route('posts')}}"><span class="">Inicio</span></a>
@if (Auth::user())
<a href="{{action('post_controller@create')}}"><span class="">Crear Posteo</span></a>
@if(Auth::user()->type_user == 'Admin'|| Auth::user()->type_user == 'Moderador' )
<a href="{{action('topic_controller@create')}}"><span class="">Crear Topic</span></a>
@endif
<a href="{{route('watch_profile')}}"><span class="">Perfil</span></a>
@if (Auth::user()->type_user == 'Admin')
	<a href="{{route('admin_users')}}"><span class="">Administrar</span></a>
@endif
<a href="{{action('User_controller@logout')}}"><span class="">Desloguearse</span></a>
@endif


@if (!Auth::user())
	<a href="{{route('login')}}"><span class="">Iniciar Sesion</span></a>
@endif

</div>

{{-- <div><img src="{{asset('/avatars/'.$user->avatar)}}" style="border-radius: 50%; height: 15px;">  <span style="padding: 5px 10px;">{{session('user')}}</span></div> --}}