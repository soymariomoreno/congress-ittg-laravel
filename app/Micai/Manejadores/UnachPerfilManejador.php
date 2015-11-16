<?php

namespace Micai\Manejadores;

class UnachPerfilManejador extends BaseManejador{
	public function getRules(){
		$rules = [
				'full_name'	=> 'required',
				'avatar'	=> '',
				'num_control'	=> 'required',
				'estado'	=> 'required',
				'municipio'	=> 'required',
				'domicilio'	=> 'required',
				'movil'		=> 'required|numeric'
			];

		return $rules;
	}

	public function moveAvatar($data){		
		$aux = explode('.',$data['avatar']->getClientOriginalName() );
		$name = \Str::slug($aux[0].rand()).'.'.$aux[1];
		$data['avatar']->move('images', $name);
		$data['avatar'] = $name;
		return $data;
	}
	
	public function moveFicha2($data){		
		$aux = explode('.',$data['ficha2']->getClientOriginalName() );
		$name = \Str::slug($aux[0].rand()).'.'.$aux[1];
		$data['ficha2']->move('images', $name);
		$data['ficha2'] = $name;
		return $data;
	}

	public function prepareData($data){

		if(isset($data['avatar'])){
			$data = $this->moveAvatar($data);
			$data['available_perfil'] = true;				
		}else{
			array_forget($data, 'avatar');
		}

		if(isset($data['ficha2'])){
			$data = $this->moveFicha2($data);
		}else{
			array_forget($data, 'ficha2');
		}

		$data['full_name'] = strip_tags($data['full_name']);
		$data['movil'] = strip_tags($data['movil']);
		$data['num_control'] = strip_tags($data['num_control']);
		$data['estado'] = strip_tags($data['estado']);
		$data['municipio'] = strip_tags($data['municipio']);
		$data['domicilio'] = strip_tags($data['domicilio']);
		return $data;
	}
}