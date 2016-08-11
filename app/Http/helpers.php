<?php 
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
function getForaneo($id) 
{
  switch ($id) {
      case 2:
        return  "Ens";
      case 3:
        return  "Tij";
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

  }
}
function getDayName($date) {
    $dt = Carbon::parse($date);

    if ($dt->dayOfWeek === Carbon::MONDAY) {
        return 'LUNES';
    }
    if ($dt->dayOfWeek === Carbon::TUESDAY) {
        return 'MARTES';
    }
    if ($dt->dayOfWeek === Carbon::WEDNESDAY) {
        return 'MIERCOLES '.$dt->month.' '.$dt->year;
    }
    if ($dt->dayOfWeek === Carbon::THURSDAY) {
        return 'JUEVES';
    }
    if ($dt->dayOfWeek === Carbon::FRIDAY) {
        return 'VIERNES';
    }
}
