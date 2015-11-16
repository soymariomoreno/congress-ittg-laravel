@extends('layout')

@section('titulo')
	Admin. Usuarios
@stop

@section('contenido')
	<section ng-app="Micai">
		<article class="item admin_usuario" ng-controller="searchController">			
			<div>
				<figure class="figure-item medium large">
					<span class="icon-user"></span>
				</figure>
				<h2 class="title-item">Administrar usuarios</h2>
	
				{{ Form::text('full_name', null, ['class'=>'input', 'ng-change'=>'search()', 'ng-model'=>'searchUsuario']) }}
				{{ Form::select('tipo',[
					''=>'Seleccionar un tipo',
					'administrador'=>'Administrador',
					'vendedor'=>'Vendedor',
					'asistente'=>'Asistente',
					'reporteador'=>'Reporteador'
				], null, ['class'=>'input', 'ng-model'=>'searchTipo', 'ng-change'=>'search()']) }}
			</div>
			<div class="usuarios-item" ng-repeat="user in users">
				<div class="info-item height-auto">					
						<input type="text" name="usuario" class="usuario input" placeholder="Nombre de usuario" value="@{{user.full_name}}" readonly>
						<input type="text" name="tipo" class="usuario input" placeholder="Tipo de usuario" value="@{{user.tipo}}" readonly>
						<input type="email" name="email" class="email input" placeholder="email" value="@{{user.email}}" readonly>
						<a href="adminusuario/@{{user.id}}" class="btn-edit btn"><span class="icon-pencil"></span>  <span class="icon-close"></span> 	</a>			
				</div>					
			</div>
	
		</article>	
	</section>
@stop