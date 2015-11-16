<?php
namespace Micai\Entidades;

class Categorias extends \Eloquent {
	protected $fillable = ['available'];

	public function contenidos(){		
		return $this->hasMany('Micai\Entidades\Contenidos')->orderBy('updated_at', 'Desc');
	}
	public function talleres(){		
		return $this->hasMany('Micai\Entidades\Contenidos')->where('categorias_id',"=",'1')->orderBy('updated_at', 'Desc');
	}
}