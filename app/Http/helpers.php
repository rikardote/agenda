<?php 
use App\Cita;
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