<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'nameclase', 
        'video'
    ];

    public function clase() {
    	return $this->belongsTo('App\Clase');
    }
}
