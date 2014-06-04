<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearOperacionTabla extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Crear Tabla
		Schema::table('operacion', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->unsignedInteger('cliente_id');
			$table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade');
			$table->string('factura', 50);
			$table->unsignedInteger('tipo_transporte_id');
			$table->foreign('tipo_transporte_id')->references('id')->on('tipo_transporte')->onDelete('cascade');
			$table->string('documento', 50);
			$table->string('container', 50)->nullable();
			$table->double('tarifa_costo');
			$table->double('tarifa_venta');
			$table->unsignedInteger('empresa_tarifa_id');
			$table->foreign('empresa_tarifa_id')->references('id')->on('empresa_tarifa')->onDelete('cascade');
			$table->string('origen', 200);
			$table->string('destino', 200);
			$table->string('embarque', 45);
			$table->unsignedInteger('estado_carga_id');
			$table->foreign('estado_carga_id')->references('id')->on('estado_carga')->onDelete('cascade');
			$table->date('fecha');
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
		Schema::drop('operacion');
	}

}
