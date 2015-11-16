<?php

use Micai\Entidades\Usuarios;
use Micai\Repositorios\UsuariosRepo;
use Micai\Repositorios\CategoriasRepo;
use Micai\Repositorios\ContenidosRepo;
use Micai\Manejadores\RegistroManejador;
use Micai\Manejadores\ContenidoManejador;
use Micai\Manejadores\AsistentePagoManejador;
use Micai\Manejadores\AccountManejador;
use Micai\Manejadores\UpdateContenidoManejador;
use Micai\Manejadores\UpdateAccountManejador;

class CreateController extends BaseController {
	
	protected $usuariosRepo, $categoriasRepo, $contenidosRepo;
	protected $contenido_editable;

	function __construct(CategoriasRepo $categoriasRepo, ContenidosRepo $contenidosRepo, 
						  UsuariosRepo $usuariosRepo){
		$this->categoriasRepo = $categoriasRepo;
		$this->contenidosRepo = $contenidosRepo;
		$this->usuariosRepo = $usuariosRepo;
	}

	public function createRegistro(){		

		$usuario =  $this->usuariosRepo->newUsuario();		
		$token = md5(Input::only('email')['email'].'tokenmicai');
		$usuario->token = $token;

		$this->data = Input::all();
		// 1 -> Vendedor de la Foraneos/Nacionales/Extranjeros
		// 3 -> Vendedor de la UNACH

		switch ($this->data['tipo_procedencia']) {
			case 'ittg':
				$this->data['institucion_procedencia']= 'Instituto Tecnologico de Tuxtla Gutierrez';
				break;

			case 'unach':
				$this->data['vendedor'] = 4;
				$this->data['institucion_procedencia']= 'Universidad Autonoma de Chiapas';
				break;
			
			default:
				$this->data['vendedor'] = 3;
				break;
		}

		$manager = new RegistroManejador($usuario, $this->data);

		$this->data = array_add($this->data, 'token', $token);		
		if($manager->save()){
			//Email de confirmacion					
			Mail::send('emails/confirmationEmail', $this->data, function ($message){
			    $message->subject('Correo de confirmación');
			    $message->from('micai@gmail.com', 'MICAI');
			    $message->to($this->data['email']);
			});
			Session::flash('aviso', 'Usuario registrado corréctamente. Para continuar con tu registro activa tu cuenta desde tu correo');
			return Redirect::route('inicio');
		}
		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function createTalleres(){


		$contenido = $this->contenidosRepo->newContenido();
		$manager = new ContenidoManejador($contenido, Input::all());

		if($manager->save()){
			Session::flash('aviso', 'Contenido registrado corréctamente');
			return Redirect::route('admintalleres');
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());

	}

}