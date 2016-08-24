<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Medico extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'Fullname',
        'save_to'    => 'slug',
    ];
     protected $table = 'medicos';

     protected $fillable = ['num_empleado', 'nombres', 'apellido_pat', 'apellido_mat', 'especialidad_id', 'horario_id', 'consultorio_id','turno', 'comentarios', 'minutes'];


    public function especialidad()
    {
    	return $this->belongsTo('App\Especialidad');
    }
    public function horario()
    {
    	return $this->belongsTo('App\Horario');
    }
    
    public function cita()
    {
        return $this->hasMany('App\Cita');
    }

    public function diasconsulta()
    {
        return $this->belongsToMany('App\Diasconsulta')->withTimestamps();
    }
    public function diaconsulta()
    {
        return $this->belongsToMany('App\Diaconsulta')->withTimestamps();
    }
    
    public function setnombresAttribute($value)
    {
        $this->attributes['nombres'] = strtoupper($value);
    }
    public function setcomentariosAttribute($value)
    {
        $this->attributes['comentarios'] = strtoupper($value);
    }
    public function setapellidopatAttribute($value)
    {
        $this->attributes['apellido_pat'] = strtoupper($value);
    }
    public function setapellidomatAttribute($value)
    {
        $this->attributes['apellido_mat'] = strtoupper($value);
    }
  
    public function getFullnameAttribute() {
        return $this->apellido_pat . ' ' . $this->apellido_mat. ' ' . $this->nombres;
    
    }
     public function consultorio()
    {
        return $this->belongsTo('App\Consultorio');
    }

}

