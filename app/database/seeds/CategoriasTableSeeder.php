<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Micai\Entidades\Categorias;

class CategoriasTableSeeder extends Seeder {

	public function run()
	{
		
		Categorias::create([
			'nombre' => 'Talleres',
			'slug'      => 'talleres'
			]);

		Categorias::create([
			'nombre' => 'Conferencias',
			'slug'      => 'conferencias'
			]);
		
		Categorias::create([
			'nombre' => 'Clinicas',
			'slug'      => 'clinicas'
			]);
	}

}