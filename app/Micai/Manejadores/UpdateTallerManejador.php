<?php
namespace Micai\Manejadores;

class UpdateTallerManejador extends BaseManejador {

	public function getRules(){
		$rules = [
				'available'	=> 'required|in:0,1'
			];

		return $rules;
	}

}
