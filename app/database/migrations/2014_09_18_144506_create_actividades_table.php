<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actividades', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->string('titulo');
			$table->integer('tipo');
			$table->string('descripcion');
			$table->string('publico_objetivo');
			$table->string('requerimientos');
			$table->dateTime('fecha');
			$table->integer('sala_id')->unsigned();
			$table->foreign('sala_id')->references('id')->on('salas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actividades');
	}

}
