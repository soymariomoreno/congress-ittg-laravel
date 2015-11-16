<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Micai\Entidades\Usuarios;


class UsuariosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

			$usuario = Usuarios::create([			
				'avatar'		=> 'avatar.png',
				'full_name'		=> 'Administrador Micai',
				'full_name'		=> 'Hector Guerra Crespo',
				'password' 		=> '123456',
				'email'			=> 'micaitec2014@gmail.com',
				'tipo' 	        => 'administrador',
				'available_email'=> true,
				'available_vendedor'=> true,
				'available_perfil'=> true,
				'contenidos_id'=> '1'
			]);	

			$usuario = Usuarios::create([			
				'avatar'		=> 'avatar.png',
				'full_name'		=> 'Jorge Octavio Guzman',
				'password' 		=> '123456',
				'email'			=> 'jogs78@gmail.com',
				'tipo' 	        => 'administrador',
				'available_email'=> true,
				'available_vendedor'=> true,
				'available_perfil'=> true,
				'contenidos_id'=> '1'
			]);	
			$usuario = Usuarios::create([			
				'avatar'		=> 'avatar.png',
				'full_name'		=> 'Hector Guerra Crespo',
				'password' 		=> '123456',
				'email'			=> 'hgcrespo@hotmail.com',
				'tipo' 	        => 'vendedor',
				'available_email'=> true,
				'available_vendedor'=> true,
				'available_perfil'=> true,
				'contenidos_id'=> '1'
			]);	
			$usuario = Usuarios::create([			
				'avatar'		=> 'avatar.png',
				'full_name'		=> 'Unach',
				'password' 		=> '123456',
				'email'			=> 'unach@gmail.com',
				'tipo' 	        => 'vendedor',
				'tipo_procedencia'=>'unach',
				'available_email'=> true,
				'available_vendedor'=> true,
				'available_perfil'=> true,
				'contenidos_id'=> '1'
			]);	

			// $usuario = Usuarios::create([			
			// 	'avatar'		=> 'avatar.png',
			// 	'full_name'		=> 'Dr. Crespo',
			// 	'password' 		=> '123456',
			// 	'email'			=> 'hgcrespo@hotmail.com',
			// 	'tipo' 	        => 'vendedor',
			// 	'available_email'=> true,
			// 	'available_vendedor'=> true,
			// 	'available_perfil'=> true,
			// 	'contenidos_id'=> '1'
			// ]);	


		// foreach (range(1,20) as $index) {

		// 	$nombreUsuario = $faker->name;					

		// 	$usuario = Usuarios::create([			
		// 		'avatar'		=> 'avatar.png',
		// 		'full_name'		=> $nombreUsuario,
		// 		'password' 		=> '123456',
		// 		'tipo' 	        => 'asistente',
		// 		'tipo_procedencia' => $faker->randomElement(['ittg', 'unach', 'foraneo', 'nacional', 'extranjero']),
		// 		'email' 		=> $faker->email,
		// 		'available_pago'=> false,
		// 		'available_pase'=> false,
		// 		'available_vendedor'=> false,
		// 		'available_taller'=> false,
		// 		'available_perfil'=> false,
		// 		'contenidos_id'=> '1'

		// 	]);	

		
		// }



		
		// $faker = Faker::create();

		// foreach(range(1, 10) as $index)
		// {
		// 	Usuario::create([

		// 	]);
		// }
	}

}