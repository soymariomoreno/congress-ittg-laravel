@extends('layout')

@section('titulo')
	Admin. Talleres
@stop

@section('scripts')	
@stop

@section('contenido')
	
	<section>
		<div class="publicar">
			{{ Form::open(['route'=>'admintalleres', 'method'=>'post', 'enctype'=>'multipart/form-data']) }}
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

				<button type="submit" class="btn-taller btn">Publicar</button>
			{{ Form::close() }}
		</div>
		<div class="habiliarTalleres">
			{{ Form::model($taller,['route'=>'availableTalleres', 'method'=>'put'])}}
				<h4>Proceso de inscripcion a talleres</h4>
				<label for="">
					Iniciar proceso
					{{ Form::radio('available','1')}}
				</label>
				<label for="">
					Teminar proceso
					{{ Form::radio('available','0')}}
				</label>
				{{ $errors->first('available', '<p class="error">:message</p>') }}
				<br>
				<br>
				<button type="submit" class="btn-taller btn">Actualizar proceso</button>
			{{ Form::close()}}			
		</div>
	</section>

	<section class="talleres">
		<h1>Agregados recientemente</h1>
		<div class="talleresRecientes overflowHidden">
				<div class="overflowHidden">
					@foreach($contenidosRecientes as $contenido)
						@if($contenido->id != 1)
							<article class="item">
								<figure class="figure-item medium large">
									<span class="icon-books"></span>
								</figure>
								<h2 class="title-item">
									<a href="{{route('taller', [$contenido->titulo, $contenido->id])}}">{{ $contenido->titulo}}</a>
								</h2>
								<div class="info-item">
									<p>{{$contenido->contenido}}</p>
								</div>
								<a href="{{route('admintaller', [$contenido->slug, $contenido->id])}}" class="tag-item ">Editar o eliminar taller</a>
							</article>	
						@endif	
					@endforeach
				</div>
		</div>

		@foreach($categorias as $categoria)
		<h1>{{$categoria->nombre}}</h1>
		<div class="overflowHidden">
			@foreach($categoria->contenidos as $contenido)
				@if($contenido->id != 1)
					<article class="item">
						<figure class="figure-item medium large">
							<span class="icon-books"></span>
						</figure>
						<h2 class="title-item">
							<a href="{{route('taller', [$contenido->titulo, $contenido->id])}}">{{ $contenido->titulo}}</a>
						</h2>
						<div class="info-item">
							<p>{{$contenido->contenido}}</p>
						</div>
						<a href="{{route('admintaller', [$contenido->slug, $contenido->id])}}" class="tag-item ">Editar o eliminar taller</a>
					</article>		
				@endif
			@endforeach				
		</div>
		@endforeach
	</section>
@stop