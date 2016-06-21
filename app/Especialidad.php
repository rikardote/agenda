<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    protected $table = 'especialidades';

    protected $fillable = ['name', 'consultorio_id'];

    public function medicos()
    {
    	return $this->hasMany('App\Medico');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function setnameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    public function scopeSearchEspecialidad($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }
    public function consultorio()
    {
        return $this->belongsTo('App\Consultorio');
    }
    
}
