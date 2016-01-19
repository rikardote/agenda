<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
     protected $table = 'tipos';

     protected $fillable = ['tipo', 'descripcion'];

    public function Pacientes()
    {
    	return $this->hasMany('App\Paciente');
    }
    public function setTipoAttribute($value) 
    {
     return $this->tipo . ' - ' . $this->descripcion;
    }
}
