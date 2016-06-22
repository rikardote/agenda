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

    public function getTipoAttribute($value)
    {
        
       return $this->code . ' - ' . $this->descripcion;
        
    }
     public function getCodeAttribute($value)
    {
        return str_pad($value, 2, '0', STR_PAD_LEFT);
    }

}
