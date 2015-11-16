<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700' rel='stylesheet' type='text/css'>
	<style>
	body{
		font-size: 16px;
		margin: 0;
		font-family: 'Open Sans', sans-serif;
	}
	li{
		list-style: none;
	}
	.logo{
		float: right;
	}

	.description{
		background: #5b8bcd;
		color: white;
	}
	</style>

</head>
<body>
	<div class="email">
		<div class="header">
			<figure class="logo">
				<img src="http://www.micai.proyectosisctectuxtla.com/images/micai.png" alt="" width="60">
			</figure>
		</div>
		<div class="content">			
				<!-- <a href="http://www.micai.proyectosisctectuxtla.com/confirmation/{{$email}}/{{$token}}" class="btn">Restaurar constraseña</a> -->
				<p>Ve al siguiente enlace para restaurar tu contraseña</p>
				<a href="http://localhost/ProyectoMicai/micai/public/password/{{$email}}/{{$token}}" class="btn">Restaurar constraseña</a>
		</div>

			
	</div>	
</body>
</html>