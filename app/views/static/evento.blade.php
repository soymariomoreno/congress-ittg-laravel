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
		</article>
	</section>
@stop
