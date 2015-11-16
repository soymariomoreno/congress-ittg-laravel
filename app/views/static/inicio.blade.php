@extends('layout')

@section('titulo')
	Inicio
@stop

@section('contenido')

	<!-- <section ng-app="myApp">		
		<h1>Tareas controller</h1>
		<div ng-controller="tareasController">			
			<span>@{{tareasrestantes()}} tareas restantes de @{{tareas.length}} </span>
			<div>
				<ul>
					<li ng-repeat="tarea in tareas">
						<input type="checkbox" ng-model="tarea.available">
						<span class="available-@{{tarea.available}}">@{{tarea.nombre}}</span>
					</li>
				</ul>
			</div>
			<form ng-submit="agregartarea()">
				<input type="text" ng-model="nuevatarea">
				<input type="submit" value="Agregar nueva tarea">				
			</form>
			<button ng-click="eliminartareas()">Eliminar tareas cumplidas</button>
		</div>
	</section> -->


	<section>
		<h1 class="title-micai">Micai</h1>
		<h2 class="center_text">13th Mexican International Conference on Artificial Intelligence (MICAI)</h2>
		<h2 class="center_text">Decimotercero Congreso Internacional Mexicano de Inteligencia Artificial</h2>
		<h2 class="center_text">2014</h2>
	</section>
@stop