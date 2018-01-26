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

      $paciente = Paciente::where('rfc', '=', $rfc)->where('tipo_id', '=', $tipo)->get();
      return Response::json($paciente,200);
      
      $tipo = Tipo::find($tipo);

      if (isset($paciente)) {
        if ($paciente->count() > 1) {

        $citas = Cita::orderBy('fecha', 'desc')->where('paciente_id', '=', $paciente->id)->take(15)->get();
        $citas->each(function($citas) {
            $citas->paciente->tipo;
            $citas->medico->especialidad;
            $citas->fecha = fecha_dmy($citas->fecha);
        });
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
      
    }
}
