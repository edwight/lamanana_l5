<?php namespace lamanana;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo('User');
    }
    public function tags()
    {
        return $this->belongsToMany('Tag');
    }
    
    public function category()
    {
        return $this->belongsTo('Category');
    }
    public function img()
    {
        return $this->hasOne('Img');
    }

}
