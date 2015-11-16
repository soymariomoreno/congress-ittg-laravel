@extends('layout')

@section('titulo')
	Validar asistentes
@stop

@section('contenido')
	<section>
		<article class="item admin_usuario">			
			<div class="margin-bottom">
				<figure class="figure-item medium large">
					<span class="icon-user"></span>
				</figure>
				<h2 class="title-item">Validar asistentes</h2>				
			</div>
	@foreach($usuarios as $usuario)		
			<div class="usuarios-item">
				<div class="info-item height-auto center_text">
					{{ Form::model($usuario, ['route'=>'updatevalidarasistentevend', 'method'=>'put']) }}
						{{Form::hidden('id')}}
						{{Form::text('full_name', null, ['class'=>'usuario input', 'placeholder'=>'Nombre de usuario', 'readonly'])}}
						
						{{Form::label('','Pago realizado')}}
						{{Form::checkbox('available_pago', 1)}}
						{{Form::label('','Pago taller')}}
						{{Form::checkbox('available_taller', 1)}}

						{{Form::select('contenidos_id', 
							$talleresLista 
						, $usuario->contenidos_id, ['class'=>'input',"disabled"=>"disabled"]) }}
						{{ $errors->first('categorias_id', '<p class="error">:message</p>') }}

						<input type="submit" class="btn" value="Actualizar">

						<a href="{{route('imprimirpase',[$usuario->id])}}" class="btn">Pase</a>
						
						<a href="{{route('showfichas',[$usuario->id])}}" class="btn">Ver fichas y foto</a>

						<a href="{{route('showsendEmailUser',[$usuario->id])}}" class="btn">Enviar email</a>

					{{ Form::close() }}
					
				</div>					
			</div>
	@endforeach	
		{{ $usuarios->links() }}
		</article>	
	</section>
@stop