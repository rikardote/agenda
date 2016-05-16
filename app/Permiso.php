<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    public function medico()
    {
    	return $this->belongsTo('App\Medico');
    }
}
