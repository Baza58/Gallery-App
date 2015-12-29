<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = [
    	'title',
    	'description'
    ];

    public function pictures() 
    {
    	return $this->hasMany('App\Picture');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
