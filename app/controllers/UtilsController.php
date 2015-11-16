<?php

use Micai\Entidades\Usuarios;
use Micai\Entidades\Contenidos;
use Micai\Repositorios\UsuariosRepo;
use Micai\Repositorios\CategoriasRepo;
use Micai\Repositorios\ContenidosRepo;
use Micai\Manejadores\RegistroManejador;
use Micai\Manejadores\ContenidoManejador;
use Micai\Manejadores\AsistentePagoManejador;
use Micai\Manejadores\AccountManejador;
use Micai\Manejadores\UpdateContenidoManejador;
use Micai\Manejadores\UpdateAccountManejador;
use Micai\Manejadores\WithoutRulesManejador;

class UtilsController extends BaseController {
	
	protected $usuariosRepo, $categoriasRepo, $contenidosRepo;
	protected $contenido_editable;

	function __construct(CategoriasRepo $categoriasRepo, ContenidosRepo $contenidosRepo, 
						  UsuariosRepo $usuariosRepo){
		$this->categoriasRepo = $categoriasRepo;
		$this->contenidosRepo = $contenidosRepo;
		$this->usuariosRepo = $usuariosRepo;
	}

	function showAnalytics(){
		$users = $this->usuariosRepo->asistentesAlfabeticos();
		$users2 = $this->usuariosRepo->asistentesVendedor();
		$users3 = $this->usuariosRepo->usuariosTipo();
		$vendedores = $this->usuariosRepo->vendedores();
		
		$html = View::make("imprimir/analytics", compact('users', 'users2', 'users3', 'vendedores'));
		return PDF::load($html, 'A4', 'portrait')->show();
	}

	function showListaTalleres(){

		$talleres = $this->contenidosRepo->buscarTodo();		
		return View::make("imprimir/listatalleres",compact('talleres'));

		//---------PDF
		//$html = View::make("imprimir/listaTalleres", compact('talleres'));
		//return PDF::load($html, 'A4', 'portrait')->show();
	}

	function inscribirtaller(){
		$usuario =  Auth::user();
		$contenido_id = Session::get('taller');
		if( $this->contenidosRepo->addCupoTaller($contenido_id) ){

			$data = ['contenidos_id' => $contenido_id];
			$manager = new WithoutRulesManejador($usuario, $data);		

			if($manager->save()){
				Session::flash('aviso', 'Se ha inscrito al taller coréctamente ');
				return Redirect::route('talleres');
			}
			Session::flash('aviso', 'Ocurrió un problema al inscribirlo al taller ');
			return Redirect::route('talleres');
		}

		Session::flash('aviso', 'Sin cupo disponible');
		return Redirect::route('talleres');

	}

	public function sendEmailMass(){
		$this->titleEmail = Input::get('titleEmail');
		$this->contentEmail = Input::get('contentEmail');
		$emails = [];

		foreach (Input::get('emails') as $key => $value) {
			$emails = explode(',', str_replace('"', '', $key) );
		}

		foreach ($emails as $key => $value) {
			$this->data = [	'email' => $value,
							'contentEmail' => $this->contentEmail
						];
			Mail::send('emails/promoEmail', $this->data, function ($message){
			    $message->subject($this->titleEmail);
			    $message->from('micai@gmail.com', 'MICAI');
			    $message->to($this->data['email']);

			});
		}		
		Session::flash('aviso', 'Emails enviados');
		return Redirect::route('estadisticas');
	}

	public function sendEmailUser(){
		$this->data = Input::all();
		$this->user = $this->usuariosRepo->buscar( Session::get('iduseremail') );

		Mail::send('emails/avisouser', $this->data, function ($message){
		    $message->subject($this->data['asunto']);
		    $message->from('micai@gmail.com', 'MICAI');
		    $message->to($this->user->email);
		});
		Session::flash('aviso', 'Email Enviado');
		return Redirect::route('validarasistentevend');


	}

	public function show(){
		$usuario = [
					Auth::user()->full_name,
					Auth::user()->email
					];	
					//dd($usuario);	
		return View::make('users/datosPaypal')->with('usuario',$usuario);
	}

}