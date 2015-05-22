<?php namespace lamanana/models;

use Illuminate\Database\Eloquent\Model;

class Revista extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $table = 'revistas';

    public function hojas()
    {
        return $this->hasMany('Hoja');
    }

}
