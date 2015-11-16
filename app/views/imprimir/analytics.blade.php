<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Estadisticas</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<style>
	body{
		font-family: 'Open Sans', sans-serif;
		font-size: 10px;
	}
	table{	
		text-align: center;	
  		border-collapse: collapse;
  		margin-bottom: 10px;
	}
	h1{
		text-align: center;
		text-transform: uppercase;
	}
	.tipo{
		text-transform: capitalize;
	}
	</style>
</head>
<body>
	<h1>Estadisticas</h1>

	<h2>Ordenados en orden alfab&eacute;tico</h2>
	<table width="100%" border="1">			
		@foreach($users as $i=>$user)

		<tr>
			<td width="10%">
				{{$i+1}}
			</td>
			<td width="30%">
				{{$user->full_name}}
			</td>
			<td width="30%">
				{{$user->email}}
			</td>			
			<td width="20%">
				@if($user->available_email == 0 && $user->available_vendedor == 0 && $user->available_perfil == 0 && $user->available_pase == 0)
					<span>Sin confirmar email</span>
				@endif
				@if($user->available_email == 1 && $user->available_vendedor == 0 && $user->available_perfil == 0 && $user->available_pase == 0)
					<span>Registrado</span>
				@endif
				@if($user->available_email == 1 && $user->available_vendedor == 1 && $user->available_perfil == 0 && $user->available_pase == 0)
					<span>Validado</span>
				@endif
				@if($user->available_email == 1 && $user->available_vendedor == 1 && $user->available_perfil == 1 && $user->available_pase == 0)
					<span>Perfil completo</span>
				@endif
				@if($user->available_email == 1 && $user->available_vendedor == 1 && $user->available_perfil == 1 && $user->available_pase == 1)
					<span>Liberado</span>
				@endif
			</td>
		</tr>			
		@endforeach				
	</table>

	<!-- <h2>Ordenados por vendedor</h2>
	<table width="100%" border="1">			
		@foreach($users2 as $i2=>$user)
		<tr>
			<td width="10%">
				{{$i2+1}}
			</td>
			<td width="30%">
				{{$user->full_name}}
			</td>
			<td width="30%">
				{{$user->email}}
			</td>			
			<td width="20%">
				@foreach ($vendedores as $element)
					@if( $element->id == $user->vendedor)
						{{$element->full_name}}
					@endif
				@endforeach
			</td>
		</tr>
		@endforeach				
	</table> -->

	<h2>Ordenados por Vendedor</h2>

	@foreach ($vendedores as $element)	
		<h3>{{$element->full_name}}</h3>		
		<table width="100%" border="1">
		<input value="{{$i2=1}}">
			@foreach($users2 as $user)			
				@if( $element->id == $user->vendedor)																												
						<tr>
							<td width="10%">
								{{$i2++}}
							</td>
							<td width="30%">
								{{$user->full_name}}
							</td>
							<td width="30%">
								{{$user->email}}
							</td>							
						</tr>																																							
				@endif				
			@endforeach			
		</table>
	@endforeach

	<h2>Ordenados por tipo de usuario</h2>
	<table width="100%" border="1">			
		@foreach($users3 as $i3=>$user)
		@if($user->tipo != 'administrador')		
		<tr>
			<td width="10%">
				{{$i3+1}}
			</td>
			<td width="30%">
				{{$user->full_name}}
			</td>
			<td width="30%">
				{{$user->email}}
			</td>			
			<td width="20%">
				<span class="tipo">{{$user->tipo}}</span>
			</td>
		</tr>		
		@endif
		@endforeach				
	</table>
</body>
</html>