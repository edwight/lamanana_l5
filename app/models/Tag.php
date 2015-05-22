<?php namespace lamanana/models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';
	
	public $timestamps = false;

	protected $fillable = array('name');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
      public function posts()
    {
        return $this->belongsToMany('Post');
    }


}
