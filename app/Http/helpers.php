<?php 
use App\User;
use App\Cita;
use Carbon\Carbon;
function fecha_ymd($date){
	return date('Y-m-d', strtotime(str_replace('/', '-', $date)));
}
function fecha_dmy($date){
	return date('d/m/Y', strtotime(str_replace('/', '-', $date)));
}

function o2a($obj) {
        if(!is_array($obj) && !is_object($obj)) return $obj;
		if(is_object($obj)) $obj = get_object_vars($obj);
        return array_map(__FUNCTION__, $obj);
}
function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') {
	$str = '';
	$count = strlen($charset);
	while ($length--) {
	    $str .= $charset[mt_rand(0, $count-1)];
	}
	return $str; 
}
function getRandomeStr($num) {
	$random_string = randString($num);
        //dd($random_string);
        $is_unique = false;
        while (!$is_unique) {
           $result = Cita::where('folio', '=', $random_string)->first();
           if (!$result)   // if you don't get a result, then you're good
             $is_unique = true;
           else                     // if you DO get a result, keep trying
             $random_string = randString($num);
        }
     return $random_string;
}
function getEdad($fecha)
{
  $dt = Carbon::parse($fecha);
  $anos = Carbon::createFromDate($dt->year, $dt->month, $dt->day)->diff(Carbon::now())->format('%y');
  return $anos;
}

function setActive($path, $request, $active = 'active')
{
        return $request->is($path) ? $active : '';
}
function checkExpire($cita_date)
{
  $expire_at = strtotime("+1 min", strtotime($cita_date));  
  $now    = date("Y-m-d H:i:s");
  $now = strtotime($now);
  if($expire_at >= $now) {
    return true;
  }
  
}
function capturado_por($id){
  $user = User::find($id);
  if ($user) {
    $notocar = Array('del','de');
    $trozos = explode(' ',$user->name);
    $iniciales = '';
    for($i=0;$i<count($trozos);$i++){
      if(in_array($trozos[$i],$notocar)) $iniciales .= $trozos[$i]." ";
      else $iniciales .= substr($trozos[$i],0,1).". ";
    }
    return $iniciales;
    //return $user->name;  
  }
  else {
   return 'U. Eliminado';   
  }
  
}
function getForaneo($id) 
{
  switch ($id) {
      case 2:
        return "Ens";
      case 3:
        return "Tij";
      case 4:
        return "SLRC";
      case 5:
        return "Tecate";
      case 6:
        return "Delta";
      case 7:
        return "Algodones";
      case 8:
        return "S.F.";
      case 9:
        return "Foraneo";

  }
}
function getMonth($date) {
    $dt = Carbon::parse($date);
    switch ($dt->month) {
      case 1:
        return 'ENE';
      case 2:
        return 'FEB';
      case 3:
        return 'MAR';
      case 4:
        return 'ABR';
      case 5:
        return 'MAY';
      case 6:
        return 'JUN';
      case 7:
        return 'JUL';
      case 8:
        return 'AGO';
      case 9:
        return 'SEP';
      case 10:
        return 'OCT';
      case 11:
        return 'NOV';
      case 12:
        return 'DIC';
    }

}
function getDay($date) {
    $dt = Carbon::parse($date);
    return $dt->day;
}
function getDia($date) {
    $dt = Carbon::parse($date);
    switch ($dt->dayOfWeek) {
      case 1:
        return 'LUN';
      case 2:
        return 'MAR';
      case 3:
        return 'MIE';
      case 4:
        return 'JUE';
      case 5:
        return 'VIE';
      case 6:
        return 'SAB';
      case 7:
        return 'DOM';
    }

}
function capturadopor($user_id){
  $user = User::find($user_id);
  return $user->name;
}

function getCitasPorPaciente($paciente_id){
  $citas = Cita::orderBy('fecha', 'desc')->where('paciente_id', '=', $paciente_id)->take(15)->get();
        $citas->each(function($citas) {
            $citas->paciente->tipo;
            $citas->medico->especialidad;
            $citas->fecha = fecha_dmy($citas->fecha);
        });
  return $citas;
}
