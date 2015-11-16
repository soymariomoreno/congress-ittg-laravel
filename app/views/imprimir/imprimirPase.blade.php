<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MICAI</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);		
		body {
			margin:0;
			font-family: 'Open Sans', sans-serif;
			padding: 0;
			height: 100%;

		}
		.invalido{
			position: absolute;
			top: 100px;
			left: 30px;
			font-size: 52px;
			opacity: 0.5;
		}
		.name{
			text-align: center;
			font-size: 2em;
			margin: 0;
			padding: 0;
		}
		.left{
			position: absolute;
			top: 0;
			left: 0;
			border: 1px solid #5b8bcd;
			height: 45%;
			width: 45%;
			padding: 1em;
		}
		.right{
			position: absolute;
			top: 0;
			right: 0;
			width: 45%;
			height: 45%;
			border: 1px solid #5b8bcd;
			padding: 1em;
		}
		.left .avatar{
			width: 50%;
			text-align: center;
			display: inline-block;
			line-height: 50%;
		}

		.left .data-front{
			width: 50%;			
			text-align: center;
			display: inline-block;
		}
		.left .data-front p{
			margin: 0.4em;
		}

		.right .top-left{
			text-align: center;
			display:  inline-block;
			margin-left: -1em;
			width: 50%;
			height: 20%;
		}
		.right .top-right{
			text-align:  center;
			display:  inline-block;
			width: 60%;
			height: 20%;
		}
		.right .center{
			text-align:  center;
			height: 9%;

		}
		.right .bottom-left{
			text-align:  center;
			display:  inline-block;
			width: 60%;
			height: 20%;
		}
		.right .bottom-right{
			text-align:  center;
			display:  inline-block;
			width: 40%;
			height: 20%;
		}

		.right p{
			margin: 0.2em 0;
			font-size: 0.9em;
		}
		.right .emergencias{
			margin: 0.2em;
		}

		.btn{
			padding: 0.8em;
			color:  white;
			background: orange;
			border-radius: 5px;
		}

		.msj{
			position: absolute;
			top:  400px;
		}



	</style>
</head>
<body>
	<section class="left">		
		<h1 class="name">{{$usuario->full_name}}</h1>
		<figure class="avatar">
			<img src="images/{{$usuario->avatar}}" alt="" width="200">			
		</figure>
		<div class="data-front">
			<figure class="codeqr">
				<img src="codeqr.png" alt="" width="80">
			</figure>
			<p><b>Decimotercero Congreso Internacional Mexicano de Inteligencia Artificial 2014</b></p>
			<p><em>{{$usuario->institucion_procedencia}}</em></p>
			<p><em>{{$usuario->estado}}</em></p>
			<p><em>{{$usuario->municipio}}</em></p>
		</div>
	</section>
	<section class="right">		
		<div class="top-left">
			<img src="images/ittg.png" alt="" width="50">
			<p><b>Representante ante el SMIA.</b></p>
			<p>M.C. Imelda Valles L&oacute;pez </p>
			<p>imevalles@yahoo.com.mx</p>
		</div>
		<div class="top-right">
			<img src="images/unach.png" alt="" width="50">
			<p><b>Coordinador General. UNACH </b></p>
			<p>Dr. Adolfo de Jes&uacute;s Sol&iacute;s Mu&ntilde;iz </p>
			<p>asolis@unach.mx</p>
		</div>
		<div class="center">
			<h1 class="emergencias">066 emergencias</h1>
		</div>
		<div class="bottom-left">
			<b>Camino Real</b>
			<p><b>Direcci&oacute;n:</b> Blvd Belisario Dom&iacute;nguez No. 1195, Santa Elena, 29060 Tuxtla Guti&eacute;rrez</p>
			<p><b>Tel:</b> 617 7777</p>
		</div>
		<div class="bottom-right">
			<img src="images/facebook-icon.png"  width="30" alt="">
			<p>facebook.com/Micai2014</p>			
			<img src="images/twitter-icon.png"  width="30" alt="">
			<p>@Micai_2014</p>
		</div>
	</section>
	@if($usuario->available_pase == 0 || $usuario->available_pase == 1)
		<h1 class="invalido">Esta copia no tiene valor oficial</h1>		
		@if($usuario->available_pase == 0)
			@if(!Session::get('var'))			
			<div class="msj">
				<p>Este pase es para verificar que tus datos están correctos y tu foto se adapte al dise&ntilde;o.</p>
				
				<p align="justify"><b>Nota: Si realizaste el pago a un taller verifica que ya te encuentres inscrito.<br>En caso de que
				desees inscribirte a uno, debes realizar el pago y subir la ficha en tu perfil.<br>
				Al imprimir tu pase no podrás realizar ninguna modificación.</b></p>								

				<p>Si consideras que no necesitas hacer cambios en tu información da clic en <i>imprimir pase oficial</i>.<br>
				De lo contrario da clic en <i>volver</i>.</p>						
				<a href="{{route('pase',[$usuario->id])}}">Imprimir pase oficial</a>				
			</div>
			@endif					
		@endif
	@endif	
	<div style="margin-left:200px;margin-top:590px">
	<a href="{{route('inicio')}}" >Volver</a>											
	</div>
</body>
</html>
