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
      return view('bitacora.index');
    }
    public function search(Request $request)
    {
      $rfc = $request->rfc;
      $today = Carbon::today();
      $today = $today->year.'-'.$today->month.'-'.$today->day;

      $pacientes = Paciente::where('rfc', '=', $rfc)->get();

      if (isset($pacientes)) {
        return view('bitacora.show')->with('pacientes', $pacientes);
      }

    }
}
