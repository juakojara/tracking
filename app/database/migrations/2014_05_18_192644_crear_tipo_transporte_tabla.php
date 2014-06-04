<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTipoTransporteTabla extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Crear Tabla
		Schema::table('tipo_transporte', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('descripcion', 20);
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
		// Drop
		Schema::drop('tipo_transporte');
	}

}
