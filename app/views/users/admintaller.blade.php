@extends('layout')

@section('titulo')
	Admin. Taller
@stop

@section('contenido')
	<section>
		{{ Form::model($taller, ['route'=>'updateAdmintaller', 'method'=>'put', 'enctype'=>'multipart/form-data']) }}		
			<div class="publicar">

				{{ Form::text('titulo', null, ['class'=>'title-taller', 'placeholder'=>'Titulo del taller']) }}
				{{ $errors->first('titulo', '<p class="error">:message</p>') }}

				{{ Form::text('cupo_taller', null, ['class'=>'title-taller', 'placeholder'=>'Cupo de asistentes']) }}
				{{ $errors->first('cupo_taller', '<p class="error">:message</p>') }}

				{{ Form::file('imagen1', ['class'=>'image-taller', 'accept'=>'image/*']) }}				
				{{ $errors->first('imagen1', '<p class="error">:message</p>') }}

				{{ Form::file('imagen2', ['class'=>'image-taller', 'accept'=>'image/*']) }}
				{{ $errors->first('imagen2', '<p class="error">:message</p>') }}
				
				{{Form::select('categorias_id', $categoriasLista, null, ['class'=>'type-taller']) }}
				{{ $errors->first('categorias_id', '<p class="error">:message</p>') }}
				

				{{ Form::textarea('contenido', null, ['class'=>'content-taller tynimce', 'placeholder'=>'Descripción del taller', 'rows'=>'7']) }}
				{{ $errors->first('contenido', '<p class="error error-contenido-taller">:message</p>') }}
				

				<button type="submit" class="btn-taller btn">Actualizar</button>
				<a href="{{route('deletetaller')}}" class="btn right">Eliminar</a>
			</div>
		{{ Form::close() }}		
	</section>	
@stop