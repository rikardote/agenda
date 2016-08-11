<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Paciente extends Model implements SluggableInterface
{
    protected $connection = 'mysql-pacientes';
    protected $table = 'pacientes';

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'Fullname',
        'save_to'    => 'slug',
    ];

    
    protected $fillable = ['rfc', 'nombres', 'apellido_pat', 'apellido_mat', 'tipo_id', 'gender', 'phone', 'phone_casa', 'address', 'colonia_id', 'foraneo_id'];

    public function setnombresAttribute($value)
    {
        $this->attributes['nombres'] = strtoupper($value);
    }
    public function setapellidopatAttribute($value)
    {
        $this->attributes['apellido_pat'] = strtoupper($value);
    }
    public function setapellidomatAttribute($value)
    {
        $this->attributes['apellido_mat'] = strtoupper($value);
    }
    public function setrfcAttribute($value)
    {
        $this->attributes['rfc'] = strtoupper($value);
        $this->attributes['rfc'] = preg_replace('/\s+/', '', $value);
    }
    public function setaddressAttribute($value)
    {
        $this->attributes['address'] = strtoupper($value);
    }
    public function getFullnameAttribute() {
        return $this->apellido_pat . ' ' . $this->apellido_mat. ' ' . $this->nombres;
    
    }
    public function cita()
    {
        return $this->hasMany('App\Cita');
    }
    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }
    public function colonia()
    {
        return $this->belongsTo('App\Colonia');
    }
    public static function repetidos()
    {
        $conteo_total = DB::raw('SUM(rfc) as total');
        $records = Paciente::getQuery()
                 ->select('*', DB::raw($conteo_total))
                 ->groupBy('rfc')
                 ->havingRaw('count(*) > 1')
                 ->get();
        return $records;
    }
  
}
