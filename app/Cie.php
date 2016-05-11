<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cie extends Model
{
	protected $fillable = ['code', 'description'];
   	
   	public function hojas()
    {
        return $this->belongsTo('App\Hoja');
    }
}
