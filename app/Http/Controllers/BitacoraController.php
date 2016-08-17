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
      if ($paciente->count() > 1) {
        $paciente->tipo;
        $citas = Cita::where('paciente_id', '=', $paciente->id)->get();
        $citas->each(function($citas) {
            $citas->paciente;
            $citas->medico->especialidad;


        });
        
        return Response::json($citas->toArray(),200);
      }else {
        $response = array(
               'error' => 'true'
            );
        return Response::json($response,500);
      }
      
    }
}
