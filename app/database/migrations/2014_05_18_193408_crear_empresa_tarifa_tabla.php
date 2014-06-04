<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearEmpresaTarifaTabla extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Crear Tabla
		Schema::table('empresa_tarifa', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('nombre', 100);
			$table->string('telefono', 45)->nullable();
			$table->string('email', 100);
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
		// Borrar Table
		Schema::drop('empresa_tarifa');
	}

}
