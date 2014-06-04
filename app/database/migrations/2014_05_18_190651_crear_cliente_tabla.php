<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearClienteTabla extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//	Crear Tabla
		Schema::table('cliente', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('email', 100)->unique();
			$table->string('nombre', 45);
			$table->string('apellido', 45);
			$table->string('telefono', 20);
			$table->string('telefono2', 20)->nullable();
			$table->string('direccion', 200);
			$table->string('password', 50);
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
		Schema::drop('cliente');
	}

}
