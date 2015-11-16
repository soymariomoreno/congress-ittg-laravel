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
			<div class="usuarios-item ">
				<div class="info-item height-auto center_text">
					{{ Form::model($usuario, ['route'=>'verificarAsistente', 'method'=>'put']) }}
						{{Form::hidden('id')}}
						{{Form::text('full_name', null, ['class'=>'usuario input', 'placeholder'=>'Nombre de usuario', 'readonly'])}}
						{{Form::text('email', null, ['class'=>'usuario input', 'placeholder'=>'Email', 'readonly'])}}
						{{Form::label('','Habilitar acceso')}}
						{{Form::checkbox('available', 1)}}
						
						<input type="submit" class="btn" value="Actualizar">
					{{ Form::close() }}
				</div>					
			</div>
	@endforeach
		{{ $usuarios->links() }}
		</article>	
	</section>
@stop