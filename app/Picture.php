<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pictures';

    protected $fillable = [
    	'title',
    	'description',
    	'url'
    ];

    public function gallery()
    {
    	return $this->belongsTo('App\Gallery');
    }
}
