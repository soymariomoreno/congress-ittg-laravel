<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;


use Micai\Entidades\Contenidos;

class ContenidosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		// foreach(range(1, 10) as $index)
		// {
			Contenidos::create([
				'titulo'     => "Sin taller",				
				'slug'       => \Str::slug("Sin taller"),
				'categorias_id'=> "1"
			]);	
		// }
	}

}