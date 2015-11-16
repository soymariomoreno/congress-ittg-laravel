<?php

namespace Micai\Entidades;

class Contenidos extends \Eloquent {
	protected $fillable = ['titulo', 'imagen1',
						   'imagen2', 'contenido',
						   'cupo_taller','cupo_ocupado', 
						   'categorias_id'];

	public function usuarios(){		
		return $this->hasMany('Micai\Entidades\Usuarios');
	}
	public function categoria(){		
		return $this->belongsTo('Micai\Entidades\Categorias', 'categorias_id');
	}

	public $attributes = [];
}