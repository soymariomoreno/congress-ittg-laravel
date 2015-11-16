<?php

use Micai\Repositorios\CategoriasRepo;
use Micai\Repositorios\ContenidosRepo;
use Micai\Repositorios\UsuariosRepo;


class SearchController extends BaseController {
	
	protected $usuariosRepo, $categoriasRepo, $contenidosRepo;

	function __construct(CategoriasRepo $categoriasRepo, ContenidosRepo $contenidosRepo, 
						  UsuariosRepo $usuariosRepo){
		$this->categoriasRepo = $categoriasRepo;
		$this->contenidosRepo = $contenidosRepo;
		$this->usuariosRepo = $usuariosRepo;
	}

	public function searchUsuarios(){

		$campo = Input::get('campo');
		$value = Input::get('valor');

		$usuarios = $this->usuariosRepo->search($campo, $value);

		return Response::json($usuarios);
	}

	public function searchUsuariosTipo(){
		$usuario = Input::get('usuario');
		$tipo = Input::get('tipo');

		$usuarios = $this->usuariosRepo->searchUsuarios($usuario, $tipo);

		return Response::json($usuarios);
	}
}