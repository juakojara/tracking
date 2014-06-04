<?php

class EstadoPago extends Eloquent{

	protected $table = 'estado_pago';

	public function pagoCliente()
	{
		return $this->belongsTo('PagoCliente', 'estado_pago_id');
	}
}