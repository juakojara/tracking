<?php

class PagoCliente extends Eloquent{

	protected $table = 'pagos_cliente';

	public function cliente()
	{
		return $this->belongsTo('Cliente', 'id');
	}

	public function tipoPago()
	{
		return $this->hasOne('TipoPago', 'id');
	}

	public function estadoPago()
	{
		return $this->hasOne('EstadoPago', 'id');
	}
}
