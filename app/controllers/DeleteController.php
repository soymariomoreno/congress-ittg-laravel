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

class DeleteController extends BaseController {
	
	protected $usuariosRepo, $categoriasRepo, $contenidosRepo;
	protected $contenido_editable;

	function __construct(CategoriasRepo $categoriasRepo, ContenidosRepo $contenidosRepo, 
						  UsuariosRepo $usuariosRepo){
		$this->categoriasRepo = $categoriasRepo;
		$this->contenidosRepo = $contenidosRepo;
		$this->usuariosRepo = $usuariosRepo;
	}

	public function deleteUsuario(){
		$this->usuariosRepo->deleteUsuario(Session::get('id_usuario'));
		Session::flash('aviso', 'Usuario eliminado');
		return Redirect::route('adminusuarios');
	}

	public function deleteAdminTaller(){
		$res = $this->contenidosRepo->deleteContenido(Session::get('id_contenido'));
		Session::flash('aviso', 'Contenido eliminado');
		Session::forget('id_contenido');
		return Redirect::route('admintalleres');
	}


}