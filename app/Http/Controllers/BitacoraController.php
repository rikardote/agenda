<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cita;
use App\Paciente;
use App\Medico;
use App\Especialidad;
use App\Tipo;
use Carbon\Carbon;
use App\Http\Requests;
use Toastr;
use Response;

class BitacoraController extends Controller
{
    public function index()
    {
      $tipos = Tipo::all()->lists('tipo', 'id')->toArray();
      asort($tipos);
      return view('bitacora.index')->with('tipos', $tipos);

    }
    public function search(Request $request)
    {
      $rfc = $request->rfc;
      $tipo = $request->tipo_id;
      $today = Carbon::today();
      $today = $today->year.'-'.$today->month.'-'.$today->day;

      $tipos = Tipo::all()->lists('tipo', 'id')->toArray();
      asort($tipos);

      $pacientes = Paciente::where('rfc', '=', $rfc)->where('tipo_id', '=', $tipo)->get();

      if (isset($pacientes)) {
        return view('bitacora.show')->with('pacientes', $pacientes)->with('tipos', $tipos);
      }
      
       
      /*

        if ($citas->count() >= 1) {
          return Response::json($citas,200);
        }
        else{
          $response = array(
               'error' => 'true'
            );
          return Response::json('No se encontro citas con paciente RFC: '.$rfc.' - '.$tipo->code,500);
        }
        
        }
      }else {
        $response = array(
               'error' => 'true'
            );
        return Response::json('No se encontro Paciente con RFC: '.$rfc.' - '.$tipo->code,500);
      }
     */ 
    }
}
