<?php

namespace Micai\Manejadores;

class AsistentePagoManejador extends BaseManejador{
	public function getRules(){
		$rules = array();

		return $rules;
	}

	public function prepareData($data){

		if( ! isset ($data['available_pago']) ){
			$data['available_pago'] = 0;
		}

		if( ! isset ($data['available_taller']) ){
			$data['available_taller'] = 0;
		}
		
		return $data;
	}
}