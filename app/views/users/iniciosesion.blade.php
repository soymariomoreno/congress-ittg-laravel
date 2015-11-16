@extends('layout')

@section('titulo')
	Inicio de sesion
@stop

@section('contenido')
	<section>		
		<article class="item inicio-sesion">


			{{ Form::open(['route'=>'login','method'=>'post']) }}			
			 	<figure class="figure-item medium large">
			 		<span class="icon-user"></span>
			 	</figure>
			 	<h2 class="title-item">Inicio de sesión</h2>
			 	<div class="info-item height-auto">
			 		{{ Form::email('email', null, ['class'=>'usuario input', 'placeholder'=>'Email']) }}
			 		{{ Form::password('password', ['class'=>'password input', 'placeholder'=>'Password']) }}
			 		<label for="remember"> {{ Form::Checkbox('remember')}} Recordarme </label>

				 	@if (Session::has('login_error'))
				 		<span class="error">El nombre de usuario o la contraseña es incorrecta</span>
				 	@endif
			 		
			 	</div>
			 	<button type="submit" class="tag-item btn">Iniciar sesión</button>
			
			{{ Form::close(); }}
			<div>
			<a href="{{route('passwordReset')}}">¿Olvidaste tu contraseña?</a>
			</div>
		</article>	
	</section>
@stop