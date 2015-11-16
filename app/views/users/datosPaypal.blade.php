@extends('layout')

@section('titulo')
	Pase MICAI
@stop

@section('contenido')
	<section>		
		<article class="item inicio-sesion">	
			 	
			 	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

			 			<figure class="figure-item medium large">
			 				<span class="icon-user"></span>
			 			</figure>
			 			<h2 class="title-item">Inicio de sesión</h2>
			 			<br />

			 			
			 				
				<!-- Identify your business so that you can collect the payments. -->
						<input type="hidden" name="business" value="shilong_92-facilitator@hotmail.com">

						<!-- Specify a Buy Now button. -->
						<input type="hidden" name="cmd" value="_xclick">

						<!-- Specify details about the item that buyers will purchase. -->
						<input type="hidden" name="item_name" value="Pase MICAI">
						<input type="hidden" name="currency_code" value="MXN">

						<!-- Provide a dropdown menu option field with prices. -->
						<input type="hidden" name="on1" value="Asistente">Asistente<br />
						<select name="os1" class="input usuario">
						<option value="Estudiante">Estudiante - $540.00 MXN</option>
						<option value="Profesionista">Profesionista - $1100.00 MXN</option>
						</select> <br />

						<!-- Specify the price that PayPal uses for each option. -->
						<input type="hidden" name="option_index" value="1">
						<input type="hidden" name="option_select0" value="Estudiante">
						<input type="hidden" name="option_amount0" value="540.00">
						<input type="hidden" name="option_select1" value="Profesionista">
						<input type="hidden" name="option_amount1" value="1100.00">

						<!-- Display the payment button. -->
						<button class="tag-item btn">
						Comprar Ahora</button>

				</form>
			
			
		</article>	
	</section>
@stop