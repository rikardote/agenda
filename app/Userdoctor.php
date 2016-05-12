<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Userdoctor extends Authenticatable
{
   
    public function medico()
    {
    	return $this->belongsTo('App\Medico');
    }
}
