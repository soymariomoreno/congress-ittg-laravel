<?php
namespace Micai\Manejadores;

class StaffPerfilManejador extends BaseManejador{
	public function getRules(){
		$rules = [
				'full_name'	=> 'required',
				'avatar'	=> 'max:2030',
				'password'	=> 'confirmed',
				'password_confirmation'	=> '',				
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
	
	public function prepareData($data){
		if(isset($data['avatar'])){
			$data = $this->moveAvatar($data);
		}else{
			array_forget($data, 'avatar');
		}

		$data['full_name'] = strip_tags($data['full_name']);		
		$data['password'] = strip_tags($data['password']);		
		return $data;
	}
}