<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Userdoctor extends Authenticatable
{
   protected $fillable = [
        'doctor_id', 'email', 'password'
    ];
    public function medico()
    {
    	return $this->belongsTo('App\Medico', 'doctor_id');
    }
}
