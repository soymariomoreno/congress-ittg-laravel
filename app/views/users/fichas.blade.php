@extends('layout')

@section('titulo')
	Fichas
@stop

@section('contenido')
	<section>	
		<article class="item-taller">
			<figure class="figure-item medium large">
				<span class="icon-books"></span>
			</figure>

			<h2 class="title-item">{{$user->full_name}}</h2>			
			<div class="center_text">						
				@if( $user->avatar )
					<h2>Foto del asistente</h2>
					<img src='{{asset("images/$user->avatar")}}' width="100%"  class="image-taller-talleres" alt="">	
				@endif

				@if( $user->ficha1 )
					<h2>Foto de depósito 1</h2>
					<img src='{{asset("images/$user->ficha1")}}' width="100%"  class="image-taller-talleres" alt="">	
				@endif
				@if( $user->ficha2 )
					<h2>Foto de depósito 2</h2>
					<img src='{{asset("images/$user->ficha2")}}' width="100%" alt="" >	
				@endif
				</div>	
		</article>
	</section>
@stop
