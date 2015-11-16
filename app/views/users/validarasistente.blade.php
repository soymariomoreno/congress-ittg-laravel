@extends('layout')

@section('titulo')
	Validar asistentes
@stop

@section('contenido')
	<section ng-app="Micai">
		<article class="item admin_usuario">			
			<div class="margin-bottom">
				<figure class="figure-item medium large">
					<span class="icon-user"></span>
				</figure>
				<h2 class="title-item">Validar asistentes</h2>
			</div>
	@foreach($usuarios as $usuario)		
			<div class="usuarios-item ">
				<div class="info-item height-auto center_text" ng-controller="valisarasistente">
					{{ Form::model($usuario, ['route'=>'updatevalidarasistente', 'method'=>'put']) }}
						{{Form::hidden('id')}}
						{{Form::text('full_name', null, ['class'=>'usuario input', 'placeholder'=>'Nombre de usuario', 'readonly'])}}
						{{Form::label('','Pago realizado')}}
						{{Form::checkbox('available_pago', 1)}}
						{{Form::label('','Pago taller')}}
						{{Form::checkbox('available_taller', 1)}}

						{{Form::select('contenidos_id', 
							$talleresLista 
						, $usuario->contenidos_id, ['class'=>'input']) }}
						{{ $errors->first('categorias_id', '<p class="error">:message</p>') }}
						
						<input type="submit" class="btn" value="Actualizar">
					{{ Form::close() }}
				</div>					
			</div>
	@endforeach	
		{{ $usuarios->links() }}
		</article>	
	</section>
@stop