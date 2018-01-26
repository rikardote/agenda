<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descanso extends Model
{
    protected $fillable = ['fecha', 'description'];

    public function setdescriptionAttribute($value)
    {
        $this->attributes['description'] = strtoupper($value);
    }
}
