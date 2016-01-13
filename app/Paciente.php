<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
     protected $table = 'pacientes';

     protected $fillable = ['rfc', 'nombres', 'apellido_pat', 'apellido_mat'];

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
    public function setrfcAttribute($value)
    {
        $this->attributes['rfc'] = strtoupper($value);
    }
}
