<?php

class PagoCliente extends Eloquent{

	protected $table = 'pagos_cliente';

	public function cliente()
	{
		return $this->belongsTo('Cliente', 'cliente_id');
	}

	public function tipoPago()
	{
		return $this->belongsTo('TipoPago', 'tipo_pago_id');
	}

	public function estadoPago()
	{
		return $this->belongsTo('EstadoPago', 'estado_pago_id');
	}

	// Validaciones
	public static $rules = array(
        'monto' => 'required|numeric',
        'date' => 'required|date',
        'numero_documento' => 'required|numeric',
        'descripcion' => 'required'
    );

    public static function validate($data){
      $reglas = self::$rules;
      return Validator::make($data, $reglas);
   }
}
