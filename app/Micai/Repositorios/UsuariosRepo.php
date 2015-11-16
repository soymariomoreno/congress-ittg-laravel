<?php

namespace Micai\Repositorios;
use Micai\Entidades\Usuarios;

class UsuariosRepo extends \Eloquent{

	public function buscar($id){
		return Usuarios::find($id);	}

	public function search($campo, $value){
		return Usuarios::where($campo, "=", $value)->get();
	}
	public function noti($id){
		return Usuarios::where('vendedor', "=", $id)->where('available_vendedor','=', false)->where('tipo','=','asistente')->count();
	}
	public function notiUser($id){
		return Usuarios::where('vendedor', "=", $id)->where('available_vendedor','=', false)->where('tipo','=','asistente')->paginate(10);
	}

	public function searchCount($campo, $value){
		return Usuarios::where($campo, "=", $value)->count();
	}

	public function buscarTodo(){
		return Usuarios::orderBy('full_name', 'Asc')->get();
	}

	public function confirmationToken($email, $token){
		return Usuarios::where('email', '=', $email)->where('token', '=', $token)->count();
	}
	public function saveconfirmationToken($email, $token){
		return $usuario = Usuarios::where('email', '=', $email)->where('token', '=', $token)->first();
	}

	public function passwordResetToken($email){
		return $usuario = Usuarios::where('email', '=', $email)->first();
	}
	
	public function buscarAsistentePaginado(){
		return Usuarios::where('tipo','=','asistente')->where('available_email','=',true)->where('available_vendedor','=',true)->where('available_perfil','=',true)->orderBy('full_name', 'Asc')->paginate(10);
	}

	public function searchUsuarios($usuario, $tipo){
		return Usuarios::where('full_name','LIKE','%' . $usuario . '%')->where('tipo','LIKE','%' . $tipo . '%')->orderBy('full_name', 'Asc')->get();
	}
	public function buscarAsistentePorVendedorPaginado($id){
		return Usuarios::where('tipo','=','asistente')->where('vendedor','=', $id)->where('available_email','=',true)->where('available_vendedor','=',true)->where('available_perfil','=',true)->orderBy('full_name', 'Asc')->paginate(10);
	}
	public function newUsuario(){
		$usuario = new Usuarios();
		$usuario->tipo = 'asistente';
		$usuario->available_pase = false;		
		$usuario->available_pago = false;		
		$usuario->available_taller = false;		
		$usuario->available_email = false;		
		$usuario->available_perfil = false;		
		$usuario->contenidos_id = 1;		
		return $usuario;
	}
	
	public function deleteUsuario($id){
		return Usuarios::where('id', '=', $id)->delete();
	}

	public function countRegistrados(){
		return Usuarios::where('tipo','=' , 'asistente' )->count();
	}

	public function countPagados(){
		return Usuarios::where('tipo','=' , 'asistente' )->where('available_pago','=', true)->count();
	}
	public function countImpresos(){
		return Usuarios::where('tipo','=' , 'asistente' )->where('available_pase','=', true)->count();
	}
	public function vendedoresList(){
		return Usuarios::where('tipo','=', 'vendedor')->lists('full_name','id');
	}


	public function asistentesAlfabeticos(){
		return Usuarios::where('tipo','=', 'asistente')->orderBy('full_name', 'Asc')->get();
	}

	public function asistentesVendedor(){
		return Usuarios::where('tipo','=', 'asistente')->orderBy('full_name', 'Asc')->get();
	}

	public function usuariosTipo(){
		return Usuarios::orderBy('tipo', 'Asc')->get();
	}

	public function vendedores(){
		return Usuarios::where('tipo','=', 'vendedor')->get();
	}
}