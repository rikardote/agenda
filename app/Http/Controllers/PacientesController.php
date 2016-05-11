<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacientesRequest;
use App\Paciente;
use App\Tipo;
use Laracasts\Flash\Flash;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
    	$pacientes = Paciente::orderBy('rfc', 'ASC')->paginate(25);
        $pacientes->each(function($pacientes) {
            $pacientes->tipo;
        });
        
    	return view('admin/pacientes/index')->with('pacientes', $pacientes);
    }

    public function create()
    {
        $tipos = Tipo::all()->lists('tipo', 'id')->toArray();
        asort($tipos);
    
        return view('admin.pacientes.createorupdate')->with('tipos', $tipos);
    }

    public function edit($id)
    {
        $paciente = Paciente::find($id);
        $tipos = Tipo::all()->lists('tipo', 'id')->toArray();

        return view('admin.pacientes.createorupdate')->with('paciente', $paciente)->with('tipos', $tipos);;
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        $paciente->fill($request->all());
        $paciente->fecha_nacimiento = fecha_ymd($request->fecha_nacimiento);

        $paciente->save();
        Flash::success('Paciente editado con exito!');
        return redirect()->route('pacientes.index');
    }

    public function store(PacientesRequest $request)
    {
        $paciente = new Paciente($request->all());
        $paciente->fecha_nacimiento = fecha_ymd($request->fecha_nacimiento);
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
