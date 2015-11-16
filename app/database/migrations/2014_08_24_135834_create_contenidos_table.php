<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContenidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contenidos', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('titulo');
			$table->text('contenido');
			$table->string('imagen1')->nullable();
			$table->string('imagen2')->nullable();
			$table->integer('cupo_taller')->unsigned();			
			$table->integer('cupo_ocupado')->unsigned();
			$table->integer('categorias_id')->unsigned();			
			$table->string('slug');

			$table->foreign('categorias_id')->references('id')->on('categorias');
			
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
		Schema::drop('contenidos');
	}

}
