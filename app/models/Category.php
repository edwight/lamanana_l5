<?php namespace lamanana/models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'categories';

    public function posts()
    {
       return $this->hasMany('Post');
    }

    public function post()
    {
       return $this->belongsTo('Post');
    }

}
