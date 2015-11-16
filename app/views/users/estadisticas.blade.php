@extends('layout')

@section('titulo')
	Estadisticas
@stop

@section('contenido')
	<section ng-app="Micai">	
		<article class="item-taller" ng-controller="filtrosController" >
			<figure class="figure-item medium large">
				<span class="icon-file"></span>
			</figure>			
			<h2 class="title-item">Estadisticas</h2>
			<div class="center_text">				
				<br>
				<h3>Asistentes registrados: {{$usersRegistrados}}</h3>
				<h3>Asistentes pagados: {{$usersPagados}}</h3>
				<h3>Asistentes que han impreso su pase: {{$usersImpresos}}</h3>

				<h3>Tabla de los asistentes</h3>
				<p>Lista de emails:</p>
				<p>@{{userEmail}}</p>

				<input type="text" class="block center_block" placeholder="Asunto del email" ng-model="titleEmail" required>				

				<textarea name="contentEmail" class="block center_block" id="" cols="50" rows="10" ng-model="contentEmail" required></textarea>

				<a href="sendemail?emails@{{userEmail}}&titleEmail=@{{titleEmail}}&contentEmail=@{{contentEmail}}" class="add block">Enviar emails</a>

				<table>
					<tr>
						<td colspan="7">
							<input type="text" placeholder="Buscar" ng-model="search">
						</td>
					</tr>
					<tr>
						<td></td>
						<td class="table-header">
							<div class="pointer triangulo-bottom" ng-click="orderBy('estado')"></div>
							Estado
							<div class="pointer triangulo-top" ng-click="orderBy('-estado')"></div>
						</td>
						<td class="table-header ">
							<div class="pointer triangulo-bottom" ng-click="orderBy('municipio')"></div>
							Municipio
							<div class="pointer triangulo-top" ng-click="orderBy('-municipio')"></div>
						</td>
						<td class="table-header ">
							<div class="pointer triangulo-bottom" ng-click="orderBy('institucion-procedencia')"></div>
							Instituto de procedencia
							<div class="pointer triangulo-top" ng-click="orderBy('-institucion-procedencia')"></div>
						</td>
						<td class="table-header ">
							<div class="pointer triangulo-bottom" ng-click="orderBy('usuario')"></div>
							Nombre
							<div class="pointer triangulo-top" ng-click="orderBy('-usuario')"></div>
						</td>
						<td class="table-header">
							<div class="pointer triangulo-bottom" ng-click="orderBy('email')"></div>
							Email
							<div class="pointer triangulo-top" ng-click="orderBy('-email')"></div>
						</td>
						<td class="table-header">
							<div class="pointer triangulo-bottom" ng-click="orderBy('taller')"></div>
							Taller
							<div class="pointer triangulo-top" ng-click="orderBy('-taller')"></div>
						</td>
					</tr>

					<tr ng-repeat="user in users | orderBy:order | filter:search">
						<td>
							<input type="checkbox" ng-model="user.available" ng-click="addDeleteEmail(user.email)" >
						</td>
						<td>@{{user.estado}}</td>
						<td>@{{user.municipio}}</td>
						<td>@{{user.institucion_procedencia}}</td>
						<td>@{{user.usuario}}</td>
						<td>@{{user.email}}</td>
						<td>@{{user.contenidos_id}}</td>
					</tr>
				</table>

				@foreach ($talleresLista as $key=>$element)
					<p style="text-align: right;">
						<em>{{$key}} => </em>
						<em>{{$element}}</em>
					</p>
				@endforeach
				
					
			</div>
		</article>
	</section>
@stop