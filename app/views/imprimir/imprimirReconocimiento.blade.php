<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Micai</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<style>
		
		body {
			margin:0;
			font-family: 'Courier', Arial;
			text-align:center;
			font-size: 16px;
		}
		.top{
			position: absolute;
			top: 0;
			left: 0;
		}
		.bottom{
			position: absolute;
			bottom: 0;
		}

		.content{
			position: absolute;
			top: 11em;			
		}

		p{
			margin: 1em 0;
			text-align:  center;
			font-size: 1.3em;
			font-weight: 300;
		}

		.constancia{
			font-weight: 700;
			font-size: 2.9em;
		}
		.name{
			font-weight: 600;
			font-size: 2em;
		}
		.title{
			font-weight: 600;
			font-size: 1.5em;
		}
		.bot{
			font-weight: 600;
			font-size: 1em
		}


	</style>
</head>
<body>
	<figure class="top">
		<img src="images/recotop.png" alt="" width="99%">		
	</figure>
	<figure class="bottom">
		<img src="images/recobottom.png" alt="" width="99%">		
	</figure>
	<div class="content">
		<p>Otorga la presente</p>
		<p class="constancia">Constancia</p>
		<p>A</p>
		 <p class="name">C. {{$usuario->full_name}}</p>

		<p>Por su destacada participaci&oacute;n como asistente al Congreso:</p>


		<p><span class="title">&quot;13th Mexican International Conference on Artificial Intelligence (MICAI)&quot;</span> <br>
			Decimotercero Congreso Internacional Mexicano de Inteligencia Artificial 2014</p>

		<p>Realizado por el Instituto Tecnol&oacute;gico de Tuxtla Guti&eacute;rrez, Universidad Aut&oacute;noma de Chiapas y la Sociedad Mexicana de Inteligencia Artificial del 19 al 21 de noviembre del presente.</p>

		<p>Tuxtla Guti&eacute;rrez, Chiapas, a 21 de noviembre de 2014.</p>

		<p class="bot">M.E.H. Jos&eacute; Luis M&eacute;ndez Navarro <br>
			Director del I.T. de Tuxtla Guti&eacute;rrez</p>		
	</div>
</body>
</html>
