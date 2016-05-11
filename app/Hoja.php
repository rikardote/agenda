<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoja extends Model
{
    
    protected $fillable = ['cita_id','paciente_id','medico_id','foraneo','laboratorio','rayosx','interconsulta',
    						'pase_otra_unidad','num_licencia_medica','num_de_dias','num_medicamentos','codigo_cie_id',
    						'primera_vez','subsecuente','reprogramada','suspendida', 'diferida', 'num_otorgados'];
    public function codigo()
    {
        return $this->hasMany('App\Cie');
    }
    public function paciente()
    {
    	return $this->belongsTo('App\Paciente');
    }
    public function medico()
    {
    	return $this->hasMany('App\Medico');
    }
}
