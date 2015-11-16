<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('avatar');
			$table->string('ficha1');
			$table->string('ficha2');
			$table->string('full_name');
			$table->string('password');			
			$table->enum('tipo',['asistente', 'vendedor', 'reporteador', 'administrador']);
			$table->enum('tipo_procedencia',['ittg', 'unach', 'foraneo', 'nacional', 'extranjero']);
			$table->string('email');
			$table->string('token');
			$table->string('vendedor');
			$table->string('institucion_procedencia');
			$table->string('estado');
			$table->string('municipio');
			$table->string('domicilio');
			$table->string('movil');
			$table->string('num_control');
			$table->boolean('available_email');
			$table->boolean('available_vendedor');
			$table->boolean('available_perfil');
			$table->boolean('available_pago');
			$table->boolean('available_taller');
			$table->boolean('available_pase');
			$table->integer('contenidos_id')->unsigned();			

			$table->foreign('contenidos_id')->references('id')->on('contenidos');			
			$table->string('remember_token')->nullable();
			
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
