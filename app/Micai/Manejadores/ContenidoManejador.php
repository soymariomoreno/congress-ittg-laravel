<?php

namespace Micai\Manejadores;

class ContenidoManejador extends BaseManejador {

	public function getRules(){
		$rules = [
				'titulo'	=> 'required',
				'cupo_taller'		=> 'required|numeric',
				'contenido'	=> 'required',
				'imagen1'	=> 'max:2030',
				'imagen2'	=> 'max:2030',
				'categorias_id'	=> 'required|exists:categorias,id'
			];

		return $rules;
	}

	public function moveImage1($data){		
		$aux = explode('.',$data['imagen1']->getClientOriginalName() );
		$name = \Str::slug($aux[0].rand()).'.'.$aux[1];
		$data['imagen1']->move('images', $name);
		$data['imagen1'] = $name;
		return $data;
	}
	
	public function moveImage2($data){		
	    $aux = explode('.',$data['imagen2']->getClientOriginalName() );
		$name = \Str::slug($aux[0].rand()).'.'.$aux[1];
		$data['imagen2']->move('images', $name);
		$data['imagen2'] = $name;
		return $data;
	}

	public function prepareData($data){

		if(isset($data['imagen1'])){
			$data = $this->moveImage1($data);
		}

		if(isset($data['imagen2'])){
			$data = $this->moveImage2($data);			
		}

		$data['titulo'] = strip_tags($data['titulo']);
		$data['contenido'] = $data['contenido'];

		$this->entity->slug = \Str::slug($data['titulo']);
		
		return $data;
	}
}
