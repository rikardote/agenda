<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
     protected $table = 'medicos';

     protected $fillable = ['num_empleado', 'nombres', 'apellido_pat', 'apellido_mat', 'cedula', 'especialidad_id', 'horario_id'];
}
