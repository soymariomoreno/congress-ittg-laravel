<?php

namespace Micai\Manejadores;

abstract class BaseManejador{
	protected $entity;
	protected $data;
	protected $errors;
	protected $images = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp'];
	protected $array = ['El archivo debe ser una imagen. '];

	public function __construct($entity, $data){
		$this->entity = $entity;
		$this->data = $data;
	}

	abstract public function getRules();

	public function isValid(){

		$rules = $this->getRules();
		$validacion = \Validator::make($this->data, $rules);
		$isValid = $validacion->passes();
		$this->errors = $validacion->messages();

		if(isset($this->data['avatar']))
			if( ! in_array($this->data['avatar']->mimeType, $this->images) ){
				$this->errors->messages = array_add($this->errors->messages, 'avatar', $this->array);
				$isValid = false;
			}

		if(isset($this->data['ficha1']))
			if( ! in_array($this->data['ficha1']->mimeType, $this->images) ){
				$this->errors->messages = array_add($this->errors->messages, 'ficha1', $this->array);
				$isValid = false;
			}

		if(isset($this->data['ficha2']))
			if( ! in_array($this->data['ficha2']->mimeType, $this->images) ){
				$this->errors->messages = array_add($this->errors->messages, 'ficha2', $this->array);
				$isValid = false;
			}

		if(isset($this->data['imagen1']))
			if( ! in_array($this->data['imagen1']->mimeType, $this->images) ){
				$this->errors->messages = array_add($this->errors->messages, 'imagen1', $this->array);
				$isValid = false;
			}

		if(isset($this->data['imagen2']))
			if( ! in_array($this->data['imagen2']->mimeType, $this->images) ){
				$this->errors->messages = array_add($this->errors->messages, 'imagen2', $this->array);
				$isValid = false;
			}
				

		return $isValid;
	}

	public function prepareData($data){
		return $data;
	}


	public function save(){
		if( ! $this->isValid()){
			return false;
		}
		
		$this->entity->fill($this->prepareData($this->data));
		$this->entity->save();
		return true;
	}

	public function getErrors(){
		return $this->errors;
	}
}