<?php

namespace Micai\Repositorios;
use Micai\Entidades\Contenidos;

class ContenidosRepo extends \Eloquent{

	public function buscar($id){
		return Contenidos::find($id);
	}

	public function buscarTodo(){
		return Contenidos::all();
	}

	public function addCupoTaller($id){
		$contenido = Contenidos::find($id);

		if( $contenido->attributes['cupo_taller'] > $contenido->attributes['cupo_ocupado'] ){
			$contenido->cupo_ocupado = $contenido->attributes['cupo_ocupado'] + 1;
			$contenido->save();
			return true;			
		}
		return false;
	}

	public function contenidosList(){		
		// $data = [];
		// $contenidos = Contenidos::all( array('id', 'titulo', 'cupo_ocupado', 'cupo_taller')) ;
		// foreach ($contenidos as $contenido) {
		// 	if($contenido['cupo_taller'] > $contenido['cupo_ocupado'])
		// 		$data = array_add($data, $contenido['id'], $contenido['titulo']);
		// }
		// return $data;
		return Contenidos::lists('titulo','id');
	}
	public function deleteCupoTaller($id){
		$contenido = Contenidos::find($id);
		$contenido->cupo_ocupado = $contenido->attributes['cupo_ocupado'] - 1;
		$contenido->save();
		return true;
	}

	public function buscarRecientes(){
		return Contenidos::orderBy('updated_at', 'Desc')->take(4)->get();
	}

	public function newContenido(){
		$contenido = new Contenidos();
		return $contenido;
	}	

	public function deleteContenido($id){
		return Contenidos::where('id', '=', $id)->delete();
	}

}