@extends('layout')

@section('titulo')
	Taller
@stop

@section('contenido')
	<section>	
		<article class="item-taller">
			<figure class="figure-item medium large">
				<span class="icon-books"></span>
			</figure>

			<h2 class="title-item">{{$taller->titulo}}</h2>
			<div class="info-item height-auto">
				<p>{{$taller->contenido}}</p>				
			</div>
			<div class="center_text">					
				@if( $taller->imagen1 )
					<img src='{{asset("images/$taller->imagen1")}}'  class="image-taller-talleres" alt="" title="{{$taller->titulo}}">	
				@endif
				@if( $taller->imagen2 )
					<img src='{{asset("images/$taller->imagen2")}}'  class="image-taller-talleres" alt="" title="{{$taller->titulo}}">	
				@endif
			</div>
			<div class="disponibilidad">
				<em> Cupo del taller: {{$taller->cupo_taller}} </em>
				<br>
				<em> Cupo disponible: {{$taller->cupo_taller - $taller->cupo_ocupado}}</em>	

				@if(is_asistente() && Auth::user()->contenidos_id == '1' && Auth::user()->available_taller == '1' && $taller->categoria->available == '1')
					<br>
					<br>					
					<a href="{{route('inscribirtaller')}}" class="btn">Inscribite al taller</a>
					<br>
					<br>
				@endif
			</div>
		</article>
	</section>
@stop
