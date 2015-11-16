@extends('layout')

@section('titulo')
	Nueva contraseña
@stop

@section('contenido')
	<section>		
		<article class="item inicio-sesion">


			{{ Form::open(['route'=>'newPassword','method'=>'post']) }}			
			 	<figure class="figure-item medium large">
			 		<span class="icon-user"></span>
			 	</figure>
			 	<h2 class="title-item">Nueva contraseña</h2>
			 	<div class="info-item height-auto">	
				 	<div>
				 		<input type="hidden" name="token" value="{{$token}}"/>				 	
				 		<input type="hidden" name="email" value="{{$email}}"/>
				 		{{ Form::password('password', ['class'=>'input', 'placeholder'=>'Contraseña']) }}
						{{ $errors->first('password', '<p class="error">:message</p>') }}					
					
						{{ Form::password('password_confirmation', ['class'=>'input', 'placeholder'=>'Confirmar contraseña']) }}
						{{ $errors->first('password_confirmation', '<p class="error">:message</p>') }}	
					</div>	
			 	</div>

			 	<button type="submit" class="tag-item btn">Enviar</button>
			
			{{ Form::close() }}

		</article>	
	</section>
@stop