<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacientesRequest;
use App\Paciente;
use Laracasts\Flash\Flash;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
    	$pacientes = Paciente::orderBy('rfc', 'ASC')->get();
    	return view('admin/pacientes/index')->with('pacientes', $pacientes);
    }

    public function create()
    {
    	
        return view('admin.pacientes.createorupdate');
    }

    public function edit($id)
    {
        $paciente = Paciente::find($id);
        
        return view('admin.pacientes.createorupdate')->with('paciente', $paciente);
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        $paciente->fill($request->all());

        $paciente->save();
        Flash::success('Paciente editado con exito!');
        return redirect()->route('pacientes.index');
    }

    public function store(PacientesRequest $request)
    {
        $paciente = new Paciente($request->all());
        $paciente->save();

        Flash::success('Paciente registrado con exito!');
        return redirect()->route('pacientes.index');
    }  

    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();

        Flash::error('Paciente ' . $paciente->rfc . ' ha sido borrado con exito!');
        return redirect()->route('pacientes.index');
    } 
}
