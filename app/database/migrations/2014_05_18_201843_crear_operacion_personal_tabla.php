<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearOperacionPersonalTabla extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Crear Tabla
		Schema::table('operacion_personal', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->unsignedInteger('operacion_id');
			$table->foreign('operacion_id')->references('id')->on('operacion')->onDelete('cascade');
			$table->unsignedInteger('personal_id');
			$table->foreign('personal_id')->references('id')->on('personal')->onDelete('cascade');
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
		// Drop Table
		Schema::drop('operacion_personal');
	}

}
