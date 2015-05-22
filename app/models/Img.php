<?php namespace lamanana/models;

use Illuminate\Database\Eloquent\Model;

class Img extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	

	protected $table = 'imgs';

    public function post()
    {
        return $this->belongsTo('Post');
    }

}
