<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cita;
use App\Paciente;
use App\Medico;
use App\Especialidad;
use App\Tipo;

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
      $paciente = Paciente::where('rfc', '=', $rfc)->where('tipo_id', '=', $tipo)->first();
      
      
      $tipo = Tipo::find($tipo);
      if (isset($paciente)) {
        if ($paciente->count() > 1) {

        $citas = Cita::where('paciente_id', '=', $paciente->id)->get();
        $citas->each(function($citas) {
            $citas->paciente->tipo;
            $citas->medico->especialidad;
            $citas->fecha = fecha_dmy($citas->fecha);
        });
        
        return Response::json($citas,200);
        }
      }else {
        $response = array(
               'error' => 'true'
            );
        return Response::json('No se encontro citas con paciente RFC: '.$rfc.' - '.$tipo->code,500);
      }
      
    }
}
