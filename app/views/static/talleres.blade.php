@extends('layout')

@section('titulo')
	Talleres
@stop

@section('contenido')
	<section>	
	@foreach($categorias as $categoria)
		<article class="overflowHidden">
			@if($categoria->id == '1')

				@if($categoria->available == '0')
					<h2>Inscripciones aun no abiertas</h2>
				@else
					<h2>Ya puedes inscribirte</h2>
				@endif

				<h1> {{$categoria->nombre}} </h1>
				@foreach($categoria->talleres as $contenido)
					@if($contenido->id != 1)
						<article class="item">
							<figure class="figure-item medium large">
								<span class="icon-books"></span>
							</figure>
							<h2 class="title-item">{{$contenido->titulo}}</h2>
							<div class="info-item">
								<p>{{$contenido->contenido}}</p>
							</div>
							<a href="{{route('taller', [$contenido->titulo, $contenido->id])}}" class="tag-item">Ver más</a>
						</article>
					@endif	
				@endforeach			
			@endif
		</article>
	@endforeach
	</section>
		
		
@stop
