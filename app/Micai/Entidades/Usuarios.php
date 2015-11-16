<?php

namespace Micai\Entidades;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuarios extends \Eloquent implements UserInterface, RemindableInterface{
	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	

	protected $fillable = ['full_name', 'avatar',  'usuario',
						   'password', 'email', 'tipo','movil',
						   'estado','municipio', 'available_pase',
						   'available_pago','available_taller',
						   'contenidos_id', 'vendedor', 'domicilio',
						   'institucion_procedencia', 'available_email', 'available_perfil',
						   'ficha1', 'ficha2', 'num_control', 'tipo_procedencia', 'available_vendedor' ];
	
	public function setPasswordAttribute($value){
		if( ! empty($value)){
			$this->attributes['password'] = \Hash::make($value);			
		}
	}
	public function contenidos(){		
		return $this->belongsTo('Micai\Entidades\Contenidos');
	}
}