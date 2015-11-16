@extends('layout')

@section('titulo')
	Enviar email
@stop

@section('contenido')
	<section>
		{{ Form::open(['route'=>'sendEmailUser', 'method'=>'post']) }}		
			<div class="publicar">
				{{ Form::text('asunto', null, ['class'=>'title-taller', 'placeholder'=>'Asunto', 'required'=>'required']) }}
				
				{{ Form::textarea('contenido', null, ['class'=>'content-taller tynimce', 'placeholder'=>'Descripción del taller', 'rows'=>'7']) }}
				{{ $errors->first('contenido', '<p class="error error-contenido-taller">:message</p>') }}
				<br>
				<button type="submit" class="btn-taller btn">Enviar</button>				
			</div>
		{{ Form::close() }}		
	</section>	
@stop