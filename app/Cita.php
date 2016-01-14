<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = ['paciente_id', 'medico_id', 'user_id', 'fecha', 'horario', 'concretada'];

    public function paciente()
    {
    	return $this->belongsTo('App\Paciente');
    }
     public function medico()
    {
    	return $this->hasMany('App\Medico');
    }
    public function getidAttribute($value)
    {
        return str_pad($value, 6, '0', STR_PAD_LEFT);
    }
}
