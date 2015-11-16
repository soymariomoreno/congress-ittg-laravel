<?php

use Micai\Entidades\Usuarios;
use Micai\Repositorios\UsuariosRepo;
use Micai\Manejadores\AsistentePaseManejador;
use Micai\Manejadores\WithoutRulesManejador;

class ImprimirController extends BaseController {

	protected $usuariosRepo;
	function __construct(UsuariosRepo $usuariosRepo){
		$this->usuariosRepo = $usuariosRepo;
	}

	public function imprimirPase($id){


		if(Session::get('id'))
			$usuario = $this->usuariosRepo->buscar(Session::get('id'));
		else
			$usuario = $this->usuariosRepo->buscar($id);

		if( $usuario->available_pago === 1 && $usuario->available_perfil === 1){
			$datetime1 = new DateTime('2014-09-17 12:30:00');
			$datetime2 = new DateTime("now");

			// if( $datetime1 > $datetime2 ){
			// 	Session::flash('aviso', 'Su pase podra ser impreso hasta el miercoles 17 de noviembre del 2014 a las 12:30 pm');
			// 	return Redirect::back();						
			// }

			$content = $usuario->id .','. $usuario->full_name .','. $usuario->email;
			DNS2D::getBarcodePngPath( 'codeqr' , $content, "QRCODE", 7, 7, array(91,139,205));
			$html = View::make("imprimir/imprimirPase", compact('usuario'));
			return PDF::load($html, 'A4', 'landscape')->show();			

		}
		else{
			// Session::flash('aviso', 'Su pago no a sido registrado o su perfil aun esta incompleto');
			$usuario = [Auth::user()->available_pago,Auth::user()->available_perfil];
			
			if($usuario[0] == 0 && $usuario[1]==0)
				Session::flash('aviso', 'Debe completar su perfíl');

			elseif($usuario[0] == 0 && $usuario[1]==1)
				Session::flash('aviso', 'Su pago no ha sido validado. Intente más tarde');
			
			return Redirect::route('inicio');			
		}
	}
	// public function imprimirReconocimiento($id = ""){

	// 	if($id)
	// 		$usuario = $this->usuariosRepo->buscar($id);
	// 	else
	// 		$usuario =  Auth::user();		

	// 	if( $usuario->available_pago === 1 && $usuario->available_pase === 1){
	// 		$html = View::make("imprimir/imprimirReconocimiento", compact('usuario'));
	// 		return PDF::load($html, 'A4', 'landscape')->show();
	// 	}
	// 	Session::flash('aviso', 'Su reconocimiento aun no esta disponible');
	// 	return Redirect::route('inicio');			
	// }

	public function imprimirPaseAprobado($id){		
		
		if($id)			
			$usuario = $this->usuariosRepo->buscar($id);					
		else
			$usuario =  Auth::user();

		if(Auth::user()->tipo == "vendedor"){
			$data = ['available_pase' => 0];
			Session::put('var','1');
		}
		else
			$data = ['available_pase' => 1];	
		
		$manager = new WithoutRulesManejador($usuario, $data);

		if($manager->save()){			
			Session::flash('aviso', 'A verificado que la informacion de tu pase es correcta');
			return Redirect::route('imprimirpase',[$usuario->id]);
		}
	}
}
