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
    public function setnameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    
}
