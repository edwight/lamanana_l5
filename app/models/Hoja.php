<?php namespace lamanana/models;

use Illuminate\Database\Eloquent\Model;

class Hoja extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	

	protected $table = 'hojas';

    public function revista()
    {
        return $this->belongsTo('Revista');
    }

}
