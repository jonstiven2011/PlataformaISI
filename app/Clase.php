<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'nameinstru',
        'instrucciones',
        'present',
        'present_2',
        'pdrive',
        'pdrive_2',
        'formulario',
        'formulario_2',
        'user_id',
        'curso_id'
    ];

    //Para Relacionar los otros modelos
    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function category() {
    	return $this->belongsTo('App\Curso');
    }
}
