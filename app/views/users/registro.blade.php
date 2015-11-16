@extends('layout')

@section('titulo')
	Registro
@stop

@section('contenido')
	<section ng-App="Micai"  ng-controller="registerController">		
		<article class="item registro">
			{{ Form::open(['route'=>'register', 'method'=>'POST', 'enctype'=>'multipart/form-data']) }}
			<!-- <form action="" method="post" id="form_registro"> -->
			<div class="margin-bottom">
				<figure class="figure-item medium large">
					<span class="icon-pencil"></span>
				</figure>
				<h2 class="title-item">Registro</h2>				
			</div>
			<div class="info-item height-auto margin-left">

				{{ Form::text('full_name', null, ['class'=>'input', 'placeholder'=>'Nombre Completo']) }}
				{{ $errors->first('full_name', '<p class="error">:message</p>') }}
					
				{{ Form::email('email', null, ['class'=>'input', 'placeholder'=>'Email']) }}
				{{ $errors->first('email', '<p class="error">:message</p>') }}
				
				{{ Form::password('password', ['class'=>'input', 'placeholder'=>'Contraseña']) }}
				{{ $errors->first('password', '<p class="error">:message</p>') }}					
				
				{{ Form::password('password_confirmation', ['class'=>'input', 'placeholder'=>'Confirmar contraseña']) }}
				{{ $errors->first('password_confirmation', '<p class="error">:message</p>') }}	

				{{Form::select('tipo_procedencia', [
					'' => 'Selecciona un tipo de usuario',
					'Estudiantes' => 
					[
						'ittg' 	=> 'Instituto Tecnologico de Tuxtla Gutierrez',
						'unach'	=> 'Universidad Autonoma de Chiapas',
						'foraneo'=>'Foraneo'
					],
					'Profesionistas / Público en general' =>
					[
						'nacional' 	=> 'Nacional',
						'extranjero'	=> 'Extranjero'
					]
					
				], null, ['class'=>'input inline', 'ng-model'=>'tipo_procedencia', 'ng-change'=>'showVendedor()']) }} 

				<span class="icon-uniE60B icon-question" title="Selecciones la institucion de prodecencia o el tipo de usuario que mas se adecue a usted" ng-model="question" ng-click="showProcedimiento()"></span>

				{{ $errors->first('tipo_procedencia', '<p class="error">:message</p>') }}
				
				
				{{Form::select('vendedor', $ListaVendedores, null, ['class'=>'input', 'ng-show'=>'availableVendedor']) }}
				{{ $errors->first('vendedor', '<p class="error">:message</p>') }}
				<p><em>Todos los campos son obligatorios</em></p>
				
			</div>
				<button type="submit" class="tag-item btn">Registrate</button>
			{{ Form::close() }}			
		</article>	

		<div class="procedimiento" ng-show="procedimiento">
				<span class="icon-close close-procedimiento" ng-click="showProcedimiento()"></span>
				<h3>Tipo de Usuario y procedimiento.</h3>

				<h4>Estudiante I.T.T.G.</h4>
				<ul>
					<li>1. Comprar el "boleto" con el profesor de tu preferencia, el debe darte una autorización verbal
				   para que te registres en el sistema el cual te pedirá que indiques tu profesor vendedor.</li>
				   <li>2. Registrarte en el sistema.</li>
				   <li>3. El sistema validará tu solicitud y tu profesor vendedor autorizará los pasos siguientes en el proceso.</li>
				   <li>4. Completar tu perfil. 
				   		<ul>
				   			<li> a. El nombre que definas es el nombre con el cual tu reconocimiento se emitirá.</li>
				   			<li>b. Cuida que tu foto sea clara, el profesor vendedor se reserva el derecho de no liberar tu pase de ingreso si considera que la foto no califica para el pase.</li>
				   			<li> c. Algunos datos son obligatorios, no se generará el pase hasta que estos estén completos.</li>
				   		</ul>
				   </li>
				   <li>5. Realizar tu pago de $540.00 al número de cuenta 65500624838 Banco Santander Serfin a nombre del Instituto Tecnológico de Tuxtla Gutiérrez.</li>
				   <li>
				   	6. Subir tu ficha de depósito a la plataforma.
				   	<ul>
				   		<li>a. Poner tu nombre y número de control en el frente de la ficha.</li>
				   		<li> b. Escanear ficha.</li>
				   		<li>c. Subir a la plataforma la ficha escaneada.</li>
				   	</ul>
				   </li>
				   <li>7. Acudir con el profesor vendedor para entregar la ficha de depósito original.  </li>
				   <li>8. El profesor debe validar tu pago en el sistema.</li>
				   <li>9. Generar tu pase de ingreso a partir del día viernes 14 de noviembre, te recomendamos hacerlo gafete. Nota: Verifica que tu profesor te haya liberado el pago, los profesores deben continuamente realizar este proceso.</li>
				   <li>10. Una vez generado el pase no podrás modificar ningún dato del perfil, cuida que tu nombre sea el correcto.</li>
				</ul>

				<h4>UNACH</h4>
				<ul>
					<li>1. La universidad otorgará una beca a los estudiantes que considere, todos los criterios de esta consideración corren a cargo de los cuerpos colegiados de la carrera de Licenciatura en Sistemas Computacionales.</li>
					<li>2. El profesor responsable de la lista de becarios es el Dr. Adolfo de Jesús Solís Muñiz. Verificar con tus profesores el procedimiento para pertenecer a esa lista.</li>
					<li>3. Una vez que se integre la lista debes registrarte en el sistema. El responsable de la lista validará tus datos y autorizará los pasos siguientes en el proceso.</li>
					<li>4. Completar tu perfil. 
						<ul>
							<li> a. El nombre que definas es el nombre con el cual tu reconocimiento se emitirá.</li>
							<li>b. Cuida que tu foto sea clara, el profesor responsable de la lista se reserva el derecho de no liberar tu pase de ingreso si considera que la foto no califica para el pase.</li>
							<li>c. Algunos datos son obligatorios, no se generará el pase hasta que estos estén completos.</li>
						</ul>
					</li>
					<li>5. El profesor responsable de la lista verificará que tus datos se hayan completado y liberará tu pase.</li>
					<li>6. Generar tu pase de ingreso a partir del día viernes 14 de noviembre, te recomendamos hacerlo gafete. Nota: Verifica que el responsable de la lista te haya liberado.</li>
					<li>7. Una vez generado el pase no podrás modificar ningún dato del perfil, cuida que tu nombre sea el correcto.</li>
				</ul>
				
				<em>Nota: Si no estas en la lista puedes participar en la categoría de estudiante foraneo.</em>


				<h4>Estudiante foraneo.</h4>
				<ul>
					<li>1. Enviar un correo al Dr. Héctor Guerra Crespo a hgcrespo@hotmail.com definiendo en el asunto/subject "Solicitud de participación MICAI 2014, estudiante foraneo", indicar tu nombre, institución de procedencia y número de matricula.</li>
					<li>2. Se te enviará un correo para que puedas ser considerado dentro del sistema. </li>
					<li>3. Registrarte en el sistema, recibirás un correo de confirmación para continuar el proceso.</li>
					<li>4. Completar tu perfil. 
						<ul>
							<li>a. El nombre que definas es el nombre con el cual tu reconocimiento se emitirá.</li>
							<li>b. Cuida que tu foto sea clara, nos reservamos el derecho de no liberar tu pase de ingreso si se considera que la foto no califica para el pase.</li>
							<li>c. Algunos datos son obligatorios, no se generará el pase hasta que estos estén completos.</li>
						</ul>
					</li>
					<li>5. Realizar tu pago de $540.00 al número de cuenta 65500624838 Banco Santander Serfin a nombre del Instituto Tecnológico de Tuxtla Gutiérrez.</li>
					<li>6. Subir tu ficha de depósito a la plataforma.
						<ul>
							<li> a. Poner tu nombre y número de control en el frente de la ficha.</li>
							<li> b. Escanear ficha.</li>
							<li>c. Subir a la plataforma la ficha escaneada, cuidando que el folio de la operación bancaria sea claro.</li>
						</ul>
					</li>
					<li>7. El Dr. Héctor Guerra liberará tu pase de ingreso.</li>
					<li>8. Generar tu pase de ingreso a partir del día viernes 14 de noviembre, te recomendamos hacerlo gafete. Nota: Verificar tu liberación.</li>
					<li>9. Una vez generado el pase no podrás modificar ningún dato del perfil, cuida que tu nombre sea el correcto.</li>
					<li>10. El primer día del congreso, miércoles 19 de noviembre se colorará un espacio para que entregues tu ficha de depósito original, es muy importante para nosotros esa ficha.</li>
					<li>11. Sólo para estudiantes fuera de México.
						<ul>
							<li>a. El pago se realizará en efectivo en pesos mexicanos el primer día del congreso, miércoles 19 de noviembre, en un espacio para tal propósito en el hotel sede (Camino Real), se te liberará el pase en los tiempos considerados para los estudiantes en México.</li>
							<li> b. $540.00 MXN equivalen a 41.53 USD a un tipo de cambio de 13.00MXP/USD ó 0.08USD/MXP.</li>
							<li>c. Tu solicitud la puedes enviar en inglés.</li>
						</ul>
					</li>
				</ul>

				<h4>Profesionista/Público en general.</h4>
				<ul>
					<li>1. Enviar un correo al Dr. Héctor Guerra Crespo a hgcrespo@hotmail.com definiendo en el asunto/subject "Solicitud de participación MICAI 2014, profesionista/público en general", indicar tu nombre y lugar de procedencia.</li>
					<li>2. Se te enviará un correo para que puedas ser considerado dentro del sistema, recibirás un correo de confirmación para continuar el proceso </li>
					<li>3. Registrarte en el sistema.</li>
					<li>4. Completar tu perfil. 
						<ul>
							<li> a. El nombre que definas es el nombre con el cual tu reconocimiento se emitirá.</li>
							<li>b. Cuida que tu foto sea clara, nos reservamos el derecho de no liberar tu pase de ingreso si se considera que la foto no califica para el pase.</li>
							<li>c. Algunos datos son obligatorios, no se generará el pase hasta que estos estén completos.</li>
						</ul>
					</li>
					<li>5. Realizar tu pago de $1,100.00 al número de cuenta 65500624838 Banco Santander Serfin a nombre del Instituto Tecnológico de Tuxtla Gutiérrez.</li>
					<li>6. Subir tu ficha de depósito a la plataforma.
						<ul>
							<li>a. Poner tu nombre y lugar de procedencia en el frente de la ficha.</li>
							<li> b. Escanear ficha.</li>
							<li>c. Subir a la plataforma la ficha escaneada, cuidando que el folio de la operación bancaria sea claro.</li>
						</ul>
					</li>
					<li>7. El Dr. Héctor Guerra liberará tu pase de ingreso.</li>
					<li>8. Generar tu pase de ingreso a partir del día viernes 14 de noviembre, te recomendamos hacerlo gafete. Nota: Verificar tu liberación.</li>
					<li>9. Una vez generado el pase no podrás modificar ningún dato del perfil, cuida que tu nombre sea el correcto.</li>
					<li>10. El primer día del congreso, miércoles 19 de noviembre se colorará un espacio para que entregues tu ficha de depósito original, es muy importante para nosotros esa ficha.</li>
					<li>11. Sólo para profesionistas/público en general fuera de México.
						<ul>
							<li>a. El pago se realizará en efectivo en pesos mexicanos el primer día del congreso, miércoles 19 de noviembre, en un espacio para tal propósito en el hotel sede (Camino Real), se te liberará el pase en los tiempos considerados para los que radiquen en México.</li>
							<li>b. $1,100.00 MXN equivalen a 84.61 USD a un tipo de cambio de 13.00MXP/USD ó 0.08USD/MXP.</li>
							<li>c. Tu solicitud la puedes enviar en inglés.</li>
						</ul>
					</li>
				</ul>

				<em>Nota: Cualquier anomalía o consideración comunicate con el Dr. Héctor Guerra Crespo a hgcrespo@hotmail.com</em>
				<span class="icon-close close-procedimiento" ng-click="showProcedimiento()"></span>
		</div>
	</section>
@stop