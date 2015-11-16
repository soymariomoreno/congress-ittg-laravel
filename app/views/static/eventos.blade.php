@extends('layout')

@section('titulo')
	Eventos
@stop

@section('contenido')
	<section>	
	@foreach($categorias as $categoria)
		<article class="overflowHidden">
			<h1> {{$categoria->nombre}} </h1>		
			@foreach($categoria->contenidos as $contenido)
				@if($contenido->id != 1)
					<article class="item">
						<figure class="figure-item medium large">
							<span class="icon-books"></span>
						</figure>
						<h2 class="title-item">{{$contenido->titulo}}</h2>
						<div class="info-item">
							<p>{{$contenido->contenido}}</p>
						</div>
						<a href="{{route('evento', [$contenido->titulo, $contenido->id])}}" class="tag-item">Ver más</a>
					</article>
				@endif	
			@endforeach			
		</article>
	@endforeach
	</section>
		
		
@stop
