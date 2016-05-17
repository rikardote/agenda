<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
	protected $fillable = ['medico_id', 'fecha_inicio', 'fecha_final'];
    public function medico()
    {
    	return $this->belongsTo('App\Medico');
    }
}
