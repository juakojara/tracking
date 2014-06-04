<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearEstadoPagoTabla extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Crear Tabla
		Schema::table('estado_pago', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('descripcion', 100);
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
		Schema::drop('estado_pago');
	}

}
