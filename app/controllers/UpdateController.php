<?php

use Micai\Entidades\Usuarios;
use Micai\Repositorios\UsuariosRepo;
use Micai\Repositorios\CategoriasRepo;
use Micai\Repositorios\ContenidosRepo;
use Micai\Repositorios\IntrusosRepo;
use Micai\Manejadores\RegistroManejador;
use Micai\Manejadores\ContenidoManejador;
use Micai\Manejadores\AsistentePagoManejador;
use Micai\Manejadores\IttgPerfilManejador;
use Micai\Manejadores\UnachPerfilManejador;
use Micai\Manejadores\ForaneoPerfilManejador;
use Micai\Manejadores\StaffPerfilManejador;
use Micai\Manejadores\UpdateContenidoManejador;
use Micai\Manejadores\UpdateTallerManejador;
use Micai\Manejadores\UpdateAccountManejador;
use Micai\Manejadores\WithoutRulesManejador;
use Micai\Manejadores\ResetPasswordManejador;

class UpdateController extends BaseController {
	
	protected $usuariosRepo, $categoriasRepo, $contenidosRepo, $intrusosRepo;
	protected $contenido_editable;

	function __construct(CategoriasRepo $categoriasRepo, ContenidosRepo $contenidosRepo, 
						  UsuariosRepo $usuariosRepo, IntrusosRepo $intrusosRepo){
		$this->categoriasRepo = $categoriasRepo;
		$this->contenidosRepo = $contenidosRepo;
		$this->usuariosRepo = $usuariosRepo;
		$this->intrusosRepo = $intrusosRepo; 
	}

	public function updateAdmintaller(){

		$contenido = $this->contenidosRepo->buscar(Session::get('id_contenido'));

		$manager = new UpdateContenidoManejador($contenido, Input::all());

		if($manager->save()){
			Session::forget('id_contenido');
			Session::flash('aviso', 'Cambios realizados corréctamente');
			return Redirect::route('admintalleres');
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function updateAvailableTalleres(){
		$data = Input::only('available');
		$categoria = $this->categoriasRepo->buscar('1');
		$manager = new UpdateTallerManejador($categoria, $data);
		
		if($manager->save()){
			return Redirect::route('admintalleres');
		}

		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function updatePerfilIttg(){
		$usuario =  Auth::user();
		$manager = new IttgPerfilManejador($usuario, Input::all());

		if($manager->save()){			
			Session::flash('aviso', 'Cambios realizados corréctamente');
			return Redirect::route('inicio');
		}
		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function updatePerfilUnach(){
		$usuario =  Auth::user();
		$manager = new UnachPerfilManejador($usuario, Input::all());

		if($manager->save()){			
			Session::flash('aviso', 'Cambios realizados corréctamente');
			return Redirect::route('inicio');
		}
		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function updatePerfilForaneo(){
		$usuario =  Auth::user();
		$manager = new ForaneoPerfilManejador($usuario, Input::all());

		if($manager->save()){			
			Session::flash('aviso', 'Cambios realizados corréctamente');
			return Redirect::route('inicio');
		}
		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}
	public function updatePerfilStaff(){
		$usuario =  Auth::user();
		$manager = new StaffPerfilManejador($usuario, Input::all());

		if($manager->save()){			
			Session::flash('aviso', 'Cambios realizados corréctamente');
			return Redirect::route('inicio');
		}
		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function updateValidarPago(){
		
		$data = Input::all();
		$usuario =  $this->usuariosRepo->buscar($data['id']);

		if($data['contenidos_id'] != '1')
			if( ! $this->contenidosRepo->addCupoTaller($data['contenidos_id']) ){
				Session::flash('aviso', 'Sin cupo disponible');
				return Redirect::route('validarasistente');
			}
			
		if($usuario->contenidos_id != '1')
			$this->contenidosRepo->deleteCupoTaller($usuario->contenidos_id);


		$data_Auth = [	'Por '.Auth::user()->full_name,
					Auth::user()->tipo,							
					'para '.$usuario->full_name,
					$usuario->tipo								
				];

		unset($data['usuario']);
		$manager = new AsistentePagoManejador($usuario, $data);		

		if($manager->save()){

			if( isset($data['available_pago'])){
				$this->setAuditoria('pagos', 'pago a conferencia validado',$data_Auth);
			}else{
				$this->setAuditoria('pagos', 'pago a conferencia no validado',$data_Auth);				
			}
			if( isset($data['available_taller'])){
				$this->setAuditoria('pagos', 'pago a taller validado',$data_Auth);
			}else{
				$this->setAuditoria('pagos', 'pago a taller no validado',$data_Auth);				
			}

			Session::flash('aviso', 'Cambios realizados corréctamente');
			return Redirect::route('validarasistente');
		}
		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}
	public function updateValidarPagoVend(){

		$data = Input::all();
		$usuario =  $this->usuariosRepo->buscar($data['id']);

		// if($data['contenidos_id'] != '1')
		// 	if( ! $this->contenidosRepo->addCupoTaller($data['contenidos_id']) ){
		// 		Session::flash('aviso', 'Sin cupo disponible');
		// 		return Redirect::route('validarasistentevend');
		// 	}

		// if($usuario->contenidos_id != '1')
		// 	$this->contenidosRepo->deleteCupoTaller($usuario->contenidos_id);
		
		unset($data['usuario']);

		$datos = [	'Por '.Auth::user()->full_name,
					Auth::user()->tipo,							
					'para '.$usuario->full_name,
					$usuario->tipo								
				];

		$manager = new AsistentePagoManejador($usuario, $data);

		if($manager->save()){			
			if( isset($data['available_pago'])){
				$this->setAuditoria('pagos', 'pago a conferencia validado',$datos);
			}else{
				$this->setAuditoria('pagos', 'pago a conferencia no validado',$datos);				
			}
			if( isset($data['available_taller'])){
				$this->setAuditoria('pagos', 'pago a taller validado',$datos);
			}else{
				$this->setAuditoria('pagos', 'pago a taller no validado',$datos);				
			}					

			Session::flash('aviso', 'Cambios realizados correctamente');	
			return Redirect::route('validarasistentevend');
		}
		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}	

	public function updateUsuario(){
		$usuario =  $this->usuariosRepo->buscar(Session::get('id_usuario'));
		$manager = new UpdateAccountManejador($usuario, Input::all());		

		if($manager->save()){
			Session::forget('id_usuario');
			Session::flash('aviso', 'Cambios realizados corréctamente');				
			return Redirect::route('adminusuarios');
		}
		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function verificarAsistente(){

		$data = Input::all();
		$usuario = $this->usuariosRepo->buscar($data['id']);
		$this->user = $usuario;

		if(isset($data['available'])){
			$data['available_vendedor'] = true;

			Mail::send('emails/authAccess', [], function ($message){
			    $message->subject('Acceso autorizado');
			    $message->from('micai@gmail.com', 'MICAI');
			    $message->to($this->user['email']);
			});
			Session::flash('aviso', 'Acceso habilitado');
		}
		else{
			$this->usuariosRepo->deleteUsuario($data['id']);

			$intruso = $this->intrusosRepo->newIntruso();
			$manager = new WithoutRulesManejador($intruso, Input::all());
			if($manager->save()){
				Session::flash('aviso', 'El email fue bloqueado');
				return Redirect::route('notifications');
			}
			return Redirect::route('notifications');
		}
			

		$manager = new WithoutRulesManejador($usuario, $data);		

		if($manager->save()){
			return Redirect::route('notifications');
		}
		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

	public function updatePassword(){

		$this->data = Input::all();
		$data = $this->usuariosRepo->passwordResetToken($this->data['email']);				

		if($data){							
			$this->data = array_add($this->data, 'token', $data->token);
			Mail::send('emails/resetpassword', $this->data, function ($message){
				    $message->subject('Restaurar contraseña');
				    $message->from('micai@gmail.com', 'MICAI');
				    $message->to($this->data['email']);
			});		
			Session::flash('aviso', 'Enviamos un email a si dirección de correo verifique las instrucciones');
			return Redirect::route('inicio');
		}
		Session::flash('aviso', 'El email no se encuentra registrado');
		return Redirect::route('passwordReset');
	}

	public function updateNewPassword(){

		$this->data = Input::all();		
		$usuario = $this->usuariosRepo->passwordResetToken($this->data['email']);

		$manager = new ResetPasswordManejador($usuario,$this->data);		

		if($manager->save()){		
			Session::flash('aviso', 'Su contraseña ha sido restaurada');
			return Redirect::route('login');
		}
		return Redirect::back()->withInput()->withErrors($manager->getErrors());
	}

}