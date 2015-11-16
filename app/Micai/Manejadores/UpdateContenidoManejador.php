<?php 
namespace Micai\Manejadores;

class UpdateContenidoManejador extends BaseManejador {

	public function getRules(){
		$rules = [
				'titulo'	=> 'required',				
				'cupo_taller'		=> 'required|numeric',
				'contenido'	=> 'required',
				'imagen1'	=> 'max:2040',
				'imagen2'	=> 'max:2040',
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
		}else{
			array_forget($data, 'imagen1');
		}


		if(isset($data['imagen2'])){
			$data = $this->moveImage2($data);
		}else{
			array_forget($data, 'imagen2');
		}

		$data['titulo'] = strip_tags($data['titulo']);
		$data['contenido'] = $data['contenido'];

		return $data;
	}
}
