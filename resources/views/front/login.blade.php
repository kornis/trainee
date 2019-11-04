@extends('front.template')
@section('css')
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('title','INGRESAR')
{{-- 
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

--}}
@section('body')
@if (isset($success))
	
{!! $success !!}

@endif
<div class="row">
<div class="banner col-md-12 col-sm-12">
	<span>PROYECTO ESTILO BLOG</span>
</div>
</div>

<div class="container login-container">
	 <div class="row">
		<div class="col-md-3 col-xs-1">
		</div>
		
		<div class="col-md-6 col-xs-10 login-content">
					
					<img src="{{asset('avatars/default.png')}}" class="login-image">
		</div>		
				<div class="col-md-3  col-xs-1">
				</div>
		
	</div>

	<div class="row login-content">
		<div class="col-md-3 col-xs-0">
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="login-cont">

			{{--	<div class="row">
						<div class="col-md-3 col-xs-0">
							</div>
							<div class="col-md-6 col-xs-12">
						<img src="{{asset('avatars/default.png')}}" class="login-image">
							</div>
						<div class="col-md-3 col-xs-0">
							</div>
				</div>
				--}}

				<form method="post" class="text-center" action="{{ action('User_controller@login')}}" style="padding:60px 30px 5px 30px; ">
					{{csrf_field()}}
					<span >LOG IN</span>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Ingrese Email" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Contraseña" class="form-control" required>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary">Iniciar Sesion</button>
					</div>
				</form>
				<div class="forgot " style="position:relative; background-color:#42B18E; padding:18px 10px 18px 10px;text-align:center">
					<small style="color: whitesmoke">Olvidó su contraseña? <a href="#">click aquí...</a></small>
				</div>
			</div>	
		</div>
	<div class="col-md-3 col-xs-0">
	</div>		
	</div>	
</div>



@endsection






