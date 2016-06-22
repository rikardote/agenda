<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    protected $connection = 'mysql-pacientes';
    protected $table = 'colonias';

    protected $fillable = ['zipcode', 'colonia'];
}
