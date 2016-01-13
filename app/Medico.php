<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
     protected $table = 'medicos';

     protected $fillable = ['num_empleado', 'nombres', 'apellido_pat', 'apellido_mat', 'cedula', 'especialidad_id', 'horario_id'];


    public function especialidad()
    {
    	return $this->belongsTo('App\Especialidad');
    }
    public function horario()
    {
    	return $this->belongsTo('App\Horario');
    }
    public function setnombresAttribute($value)
    {
        $this->attributes['nombres'] = strtoupper($value);
    }
    public function setapellidopatAttribute($value)
    {
        $this->attributes['apellido_pat'] = strtoupper($value);
    }
    public function setapellidomatAttribute($value)
    {
        $this->attributes['apellido_mat'] = strtoupper($value);
    }
}

