<?php

namespace Micai\Manejadores;

class ResetPasswordManejador extends BaseManejador{
	public function getRules(){
		$rules = [
				'password'	=> 'required|confirmed',
				'password_confirmation'	=> 'required',				
			];

		return $rules;
	}
}	