<?php

class TipoPago extends Eloquent{

	protected $table = 'tipo_pago';

	public function pagoCliente()
	{
		return $this->belongsTo('PagoCliente','tipo_pago_id');
	}
}