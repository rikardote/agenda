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

    protected $fillable = ['name'];

    public function medicos()
    {
    	return $this->hasMany('App\Medico');
    }
    public function especialidades()
    {
        return $this->belongsToMany('App\Especialidad');
    }
    public function setnameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    public function scopeSearchEspecialidad($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }
    
}
