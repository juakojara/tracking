<?

class TipoPersonal extends Eloquent{

	protected $table = 'tipo_personal';

	public function personal()
	{
		$this->belongsTo('Personal', 'tipo_personal_id');
	}
}