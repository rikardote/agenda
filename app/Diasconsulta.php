<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diasconsulta extends Model
{
    protected $table = 'diasconsulta';

    protected $fillable = ['day_name'];

    public function users()
    {
        return $this->belongsToMany('App\Medico');
    }
}
