<?php
namespace Micai\Manejadores;

class UpdateAccountManejador extends BaseManejador{
	public function getRules(){
		$rules = [
				'full_name'	=> 'required',
				'email'		=> 'required|email|unique:usuarios,email,' . $this->entity->id,
				'password'	=> 'confirmed',
				'password_confirmation'	=> '',
				'tipo'		=> 'required|in:asistente,vendedor,reporteador,administrador',
			];

		return $rules;
	}


	public function prepareData($data){
		$data['full_name'] = strip_tags($data['full_name']);
		$data['email'] = strip_tags($data['email']);
		$data['password'] = strip_tags($data['password']);
		return $data;
	}
}