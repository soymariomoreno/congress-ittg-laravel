@extends('layout')

@section('titulo')
	Lista de talleres
@stop

@section('contenido')
	<section>
	<h1>Lista de Talleres</h1>
	
	@foreach($talleres as $taller)		
		<h2>{{$taller->titulo}}</h2>
		<input value={{$i=1}} hidden>				
		<table width="100%" border=1 style="font-size:10px">							
		@foreach($taller->usuarios as $asistente)				
			@if($asistente->tipo === 'asistente')
				@if($i===1)
					<tr>
						<td width="2%">No.</td>
						<td width="15%">Nombre completo</td>
						<td width="15%">E-mail</td>
						<td width="10%">Telefono</td>
						<td width="15%">Procedencia</td>
						<td width="5%">Numero de Control</td>
						<td width="10%">Estado</td>
						<td width="10%">Municipio</td>
						<td width="18%">Domicilio</td>						
					</tr>
				@endif							
				<tr>
					<td width="2%">{{$i++}}</td>
					<td width="15%">{{$asistente->full_name}}</td>
					<td width="15%">{{$asistente->email}}</td>
					<td width="10%">{{$asistente->movil}}</td>
					<td width="15%">{{$asistente->institucion_procedencia}}</td>
					<td width="5%">{{$asistente->num_control}}</td>
					<td width="10%">{{$asistente->estado}}</td>
					<td width="10%">{{$asistente->municipio}}</td>
					<td width="18%">{{$asistente->domicilio}}</td>					
				</tr>				
			@endif
		@endforeach				
		</table>
	@endforeach
	</section>
@stop	