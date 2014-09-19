<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePonentesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ponentes', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->string('nombre');
			$table->string('procedencia');
			$table->string('organizacion');
			$table->string('bio');
			$table->integer('actividad_id')->unsigned();
			$table->foreign('actividad_id')->references('id')->on('actividades');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ponentes');
	}

}
