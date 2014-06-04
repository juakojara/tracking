<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearPagosClientesTabla extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Crear Tabla
		Schema::table('pagos_cliente', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->unsignedInteger('cliente_id');
			$table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade');
			$table->unsignedInteger('tipo_pago_id');
			$table->foreign('tipo_pago_id')->references('id')->on('tipo_pago')->onDelete('cascade');
			$table->integer('monto');
			$table->date('fecha');
			$table->string('numero_documento', 50);
			$table->string('descripcion', 400);
			$table->unsignedInteger('estado_pago_id');
			$table->foreign('estado_pago_id')->references('id')->on('estado_pago')->onDelete('cascade');
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
		Schema::drop('pagos_cliente');
	}

}
