<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearPersonalTabla extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Crear Tabla
		Schema::table('personal', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('email', 100)->unique();
			$table->string('nombre', 100);
			$table->unsignedInteger('tipo_personal_id');
			$table->foreign('tipo_personal_id')->references('id')->on('tipo_personal')->onDelete('cascade');
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
		Schema::drop('personal');
	}

}
