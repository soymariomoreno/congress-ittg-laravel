<?php

namespace Micai\Manejadores;

class RegistroManejador extends BaseManejador{
	public function getRules(){
		$rules = [
				'full_name' => 'required', 	
				'password'	=> 'required|confirmed',
				'password_confirmation'	=> 'required',
				'email'		=> 'required|email|unique:usuarios,email|unique:intrusos,email',
				'tipo_procedencia'	=> 'required|in:ittg,unach,foraneo,nacional,extranjero',
				'vendedor'	=> 'required'
			];

		return $rules;
	}

	public function prepareData($data){

		$data['avatar'] = 'avatar.png';
		$data['email'] = strip_tags($data['email']);
		$data['password'] = strip_tags($data['password']);
		return $data;
	}
}