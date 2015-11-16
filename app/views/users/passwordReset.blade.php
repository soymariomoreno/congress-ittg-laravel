@extends('layout')

@section('titulo')
	Recuperar contraseña
@stop

@section('contenido')
	<section>		
		<article class="item inicio-sesion">


			{{ Form::open(['route'=>'passwordemail','method'=>'post']) }}			
			 	<figure class="figure-item medium large">
			 		<span class="icon-user"></span>
			 	</figure>
			 	<h2 class="title-item">Restaurar contraseña</h2>
			 	<div class="info-item height-auto">
			 		{{ Form::email('email', null, ['class'=>'usuario input', 'placeholder'=>'Email']) }}			 					 									 
			 	</div>

			 	<button type="submit" class="tag-item btn">Enviar</button>
			
			{{ Form::close(); }}

		</article>	
	</section>
@stop