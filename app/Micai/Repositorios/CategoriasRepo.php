<?php

namespace Micai\Repositorios;
use Micai\Entidades\Categorias;

class CategoriasRepo{

	public function buscar($id){
		return Categorias::find($id);
	}
	public function buscarTodo(){
		return Categorias::all();
	}
	public function categoriasList(){
		return Categorias::lists('nombre','id');
	}
}