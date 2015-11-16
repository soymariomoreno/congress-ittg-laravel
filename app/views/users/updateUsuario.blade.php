@extends('layout')

@section('titulo')
	Cambios
@stop

@section('contenido')
	<section>		
		<article class="item registro">
			{{ Form::model($user, ['route'=>'updateUsuario', 'method'=>'PUT']) }}
			
				<figure class="figure-item medium large">
					<span class="icon-pencil"></span>
				</figure>
				<h2 class="title-item">Modificar perfil</h2>
				<div class="info-item height-auto">


					{{ Form::text('full_name', null, ['class'=>'input usuario', 'placeholder'=>'Usuario']) }}
					{{ $errors->first('full_name', '<p class="error">:message</p>') }}

					{{ Form::password('password', ['class'=>'input password', 'placeholder'=>'Contraseña']) }}
					{{ $errors->first('password', '<p class="error">:message</p>') }}					

					{{ Form::password('password_confirmation', ['class'=>'input password', 'placeholder'=>'Confirmar contraseña']) }}
					{{ $errors->first('password_confirmation', '<p class="error">:message</p>') }}					
					
					{{ Form::email('email', null, ['class'=>'input email', 'placeholder'=>'Email']) }}
					{{ $errors->first('email', '<p class="error">:message</p>') }}

					{{Form::select('tipo', 
					[
						'asistente'=>'Asistente',
						'vendedor'=>'Vendedor',
					 	'reporteador'=>'Reporteador', 
						'administrador'=>'Administrador'
					]
					, $user->tipo, ['class'=>'type-taller input']) }}
					{{ $errors->first('tipo', '<p class="error">:message</p>') }}

				</div>
				<button type="submit" class="tag-item btn">Actualizar</button>
				<a href="{{route('deleteUsuario')}}" class="btn right">Eliminar</a>
			{{ Form::close() }}
		</article>	
	</section>
@stop
