<?php namespace lamanana/models;

use Illuminate\Database\Eloquent\Model;

class Chicahot extends Model {

	protected $table = 'chicahots';

    public function user()
    {
        return $this->belongsTo('User');
    }

}
