<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <meta charset="UTF-8"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title> @yield('titulo') </title>
	<link rel="stylesheet" href=" {{asset('css/estilos.css')}} ">
	<script type="text/javascript" src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script type="text/javascript">
	tinymce.init({
		mode: "specific_textareas",
		editor_selector: "tynimce",
	    width: 600,
    	toolbar: "forecolor backcolor",
    	theme: "modern",
	    plugins: [
	         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	         "save table contextmenu directionality emoticons template paste textcolor"
	   ],
	   content_css: "css/content.css",
	   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
	   style_formats: [
	        {title: 'Bold text', inline: 'b'},
	        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
	        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
	        {title: 'Example 1', inline: 'span', classes: 'example1'},
	        {title: 'Example 2', inline: 'span', classes: 'example2'},
	        {title: 'Table styles'},
	        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
	    ]
	 });
	</script>
</head>
<body>
	<header>
		<figure class="figure-micai">
			<img src="{{asset('images/micai.png')}}" alt="">
		</figure>
		<span class="icon-menu small"></span>
		<h1 class="title-header small">MICAI</h1>
		<h1 class="title-header medium large">Decimotercero Congreso Internacional Mexicano de Inteligencia Artificial 2014</h1>
		<figure class="figure-ittg">
			<img src="{{asset('images/ittg.png')}}" alt="">
			<img src="{{asset('images/unach.png')}}" alt="">
		</figure>

		@if($aviso = Session::get('aviso'))
			<div class="aviso">
				<span>{{$aviso}}</span>
				<span class="icon-close close"></span>
			</div>
		@endif 

	</header>
	<nav>
		<ul>
			<li><a href="{{route('inicio')}}">Inicio</a></li>			
			<li><a href="{{route('eventos')}}">Eventos</a></li>

			<div class="item-sesiones">			
				@if(Auth::check())
					<li class="sesion small">
						<a href="#" title="Iniciar sesión">
							{{Auth::user()->usuario}}
							<span class="icon-user"></span>
						</a>
					</li>
					<li class="sesion small">
						<a href="{{route('notifications')}}">
							 Habilitar accesos
							 <span class="icon-bell"></span> {{Session::get('noti')}}
						</a>
					</li>
					<li class="sesion medium large right">
						@if(Auth::user()->available_perfil == '0' && Auth::user()->tipo == 'asistente')
							<div href="#" title="Status pendiente: falta llenar perfil" class="status-pendiente user">
						@else
							<div href="#" title="Status correcto" class="user">
						@endif
							<img class="avatar" src="{{asset('images&#47;')}}{{Auth::user()->avatar}}" alt='{{Auth::user()->avatar}}'>							
							{{Auth::user()->full_name}} <a class="inline" href="{{route('taller',[Auth::user()->contenidos->slug,Auth::user()->contenidos->id])}}">
							@if(is_asistente())
								- {{Auth::user()->contenidos->titulo}}
							@endif
							@if(is_vendedor())
								<a class="inline" href="{{route('notifications')}}"> <span class="icon-bell"></span> {{Session::get('noti')}}</a>
							@endif
						</a> 
						</div>
					</li>
				@else
					<li class="sesion small"><a href="{{route('iniciosesion')}}">Iniciar sesión</a></li>
					<li class="sesion medium large right"><a class="user" href="{{route('iniciosesion')}}" title="Iniciar sesión"><span class="icon-user"></span></a></li>
					<li class="sesion small"><a href="{{route('registro')}}">Registrate</a></li>			
					<li class="sesion medium large right"><a class="user" href="{{route('registro')}}" title="Registrate"><span class="icon-pencil"></span></a></li>					
				@endif		
			</div>

			@if( Auth::check() )
				@if(is_asistente())
					<li class="small"><a href="{{ route('imprimirpase',[Auth::user()->id]) }}">Imprimir pase de ingreso</a></li>
					<li class="small"><a href="{{route('talleres')}}">Talleres disponibles</a></li>					
				@endif
				@if(is_vendedor())
					<li class="small"><a href="{{ route('validarasistentevend') }}">Validar asistente</a></li>				
					<li class="small"><a href="{{ route('Analytics') }}">Ver estadisticas</a></li>
				@endif
				@if(is_reporteador())
					<li class="small"><a href="{{ route('estadisticas') }}">Ver estadísticas</a></li>				
				@endif

				@if(is_admin())
					<li class="small"><a href="{{ route('admintalleres') }}">Admin talleres</a></li>
					<li class="small"><a href="{{ route('adminusuarios') }}">Admin usuarios</a></li>				
					<li class="small"><a href="{{ route('validarasistente') }}">Validar asistente</a></li>
					<li class="small"><a href="{{ route('Analytics') }}">Ver estadisticas</a></li>				
					<li class="small"><a href="{{ route('listatalleres') }}">Lista asistentes a taller</a></li>					
				@endif

				@if(Auth::user()->available_pase == 0)
					<li class="small"><a href="{{ route('perfil') }}" title="Modificar perfil">Modificar perfil</span></a></li>
				@endif
				
				<li class="small"><a href="{{ route('logout') }}" title="Cerrar sesión">Cerrar sesión</a></li>
			@endif


			
		</ul>
	</nav>
	
	<div class="menu-personal right medium large">
		<ul>
			@if( Auth::check() )
				@if(is_asistente())
					<li class=""><a href="{{ route('imprimirpase',[Auth::user()->id]) }}">Imprimir pase de ingreso</a></li>
					<li><a href="{{route('talleres')}}">Talleres disponibles</a></li>					
				@endif
				@if(is_vendedor())
					<li class=""><a href="{{ route('validarasistentevend') }}">Validar asistente</a></li>				
					<li class=""><a href="{{ route('Analytics') }}">Ver estadisticas</a></li>				
				@endif
				@if(is_reporteador())
					<li class=""><a href="{{ route('estadisticas') }}">Ver estadísticas</a></li>				
				@endif

				@if(is_admin())
					<li><a href="{{ route('admintalleres') }}">Admin talleres</a></li>
					<li><a href="{{ route('adminusuarios') }}">Admin usuarios</a></li>				
					<li><a href="{{ route('validarasistente') }}">Validar asistente</a></li>
					<li class=""><a href="{{ route('Analytics') }}">Ver estadísticas</a></li>				
					<li><a href="{{ route('listatalleres') }}">Lista asistentes a taller</a></li>					
				@endif

				@if(Auth::user()->available_pase == 0)
					<li><a href="{{ route('perfil') }}" title="Modificar perfil">Modificar perfil</span></a></li>
				@endif

				<li><a href="{{ route('logout') }}" title="Cerrar sesión">Cerrar sesión</a></li>
			@endif
		</ul>
	</div>

	@yield('contenido')



	<footer class="footer">	
		<p>I.T. de Tuxtla Gutiérrez, página informativa del MICAI 2014. </p>
		<p>Responsable de los talleres: Jorge Octavio Guzmán Sánchez.</p>
		<p>Última actualización marzo 2014.</p>
	</footer>

	<script src="{{asset('lib/jquery.js')}}"></script>
	<script src="{{asset('lib/angularjs.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
	
	@yield('scripts')

</body>
</html>
