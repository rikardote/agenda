<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    public function medicos()
    {
    	return $this->belongsTo('App\Medico');
    }
}
