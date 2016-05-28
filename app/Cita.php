<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = ['paciente_id', 'medico_id', 'user_id', 'fecha', 'horario', 'concretada', 'capturado_por','folio','foraneo','laboratorio','rayosx','interconsulta',
                'pase_otra_unidad','num_licencia_medica','num_de_dias','num_medicamentos','codigo_cie_id',
                'primera_vez','subsecuente','reprogramada','suspendida', 'diferida', 'num_otorgados'];

    public function paciente()
    {
    	return $this->belongsTo('App\Paciente');
    }
    public function medico()
    {
    	return $this->belongsTo('App\Medico');
    }
    public function codigo()
    {
        return $this->belongsTo('App\Cie','codigo_cie_id');
    }
    

    public function getidAttribute($value)
    {
        return str_pad($value, 6, '0', STR_PAD_LEFT);
    }

    public static function getTotalCitas($medico_id, $fecha)
    {
      $conteo_total = DB::raw('count(*) as total');
      $citas = Cita::getQuery()
                 ->select('fecha',DB::raw($conteo_total))
                 ->where('medico_id', $medico_id)
                 ->groupBy('fecha')
                 ->get();
         
      $fechas = array();
      $count = 0;
     
      foreach($citas as $i => $cita) {
        if($cita->total == 10){
            $fechas[$count++] = $cita->fecha;
        }
      }
     
      
      return $fechas;

    }
    public static function getTotalCitasCount($medico_id, $fecha)
    {
      $conteo_total = DB::raw('count(*) as total');
      $citas = Cita::getQuery()
                 ->select('fecha',DB::raw($conteo_total))
                 ->where('medico_id', $medico_id)
                 ->where('fecha', $fecha)
                 ->groupBy('fecha')
                 ->first();

        if ($citas) {
            if($citas->total == 10){
                return 1;
            }
            else{

                return 0;           
            }    
        }
        else{
            return 0;           
        }
        

    }
}
