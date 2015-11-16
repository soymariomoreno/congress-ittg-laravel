@extends('layout')

@section('titulo')
	Perfil
@stop

@section('contenido')
	<section>		
		<article class="item registro">
			{{ Form::model($user, ['route'=>'updatePerfilStaff', 'method'=>'PUT', 'enctype'=>'multipart/form-data']) }}
			<!-- <form action="" method="post" id="form_registro"> -->
			<div class="margin-bottom">
				<figure class="figure-item medium large">
					<span class="icon-pencil"></span>
				</figure>
				<h2 class="title-item">Perfil</h2>				
			</div>
			<div class="info-item height-auto margin-left">
				{{ Form::text('full_name', null, ['class'=> 'input usuario', 'placeholder'=>'Nombre completo', 'title'=>'Con este nombre se imprimira su pase y reconocimiento']) }}
				{{ $errors->first('full_name', '<p class="error">:message</p>') }}				

				{{ Form::password('password', ['class'=>'input', 'placeholder'=>'Contraseña']) }}
				{{ $errors->first('password', '<p class="error">:message</p>') }}					
				
				{{ Form::password('password_confirmation', ['class'=>'input', 'placeholder'=>'Confirmar contraseña']) }}
				{{ $errors->first('password_confirmation', '<p class="error">:message</p>') }}	

				{{Form::label('avatar', 'Imagen para su perfil')}}
				{{ Form::file('avatar', ['class'=>'input', 'accept'=>'image/*', 'title'=>'Avatar para tu perfil']) }}
				{{ $errors->first('avatar', '<p class="error">:message</p>') }}

			</div>
				<button type="submit" class="tag-item btn">Guardar</button>
			{{ Form::close() }}
			<!-- </form> -->


			<!-- <form action="" method="post" id="form_registro">
				<figure class="figure-item medium large">
					<span class="icon-pencil"></span>
				</figure>
				<h2 class="title-item">Registro</h2>
				<div class="info-item height-auto">
					<input type="text" name="usuario" class="input usuario" placeholder="Usuario" required>
					<input type="password" name="password" class="input" id="password" placeholder="Contraseña" required>
					<input type="password" name="password" class="input" id="password2" placeholder="Confimar contraseña" required>
					<input type="email" name="email" class="input" placeholder="Email" required>
				</div>
				<button type="submit" class="tag-item btn">Registrate</button>
			</form>
			 -->
		</article>	
	</section>
@stop