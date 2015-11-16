<?php

namespace Micai\Repositorios;
use Micai\Entidades\Intrusos;

class IntrusosRepo{

	public function newIntruso(){
		$intruso = new Intrusos();		
		return $intruso;
	}
}