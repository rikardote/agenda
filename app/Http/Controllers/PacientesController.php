<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacientesRequest;
use App\Paciente;
use App\Cita;
use App\Colonia;
use App\Tipo;
use Laracasts\Flash\Flash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Response;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
    	$pacientes = Paciente::orderBy('apellido_pat', 'ASC')->paginate(25);
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
        $paciente->colonia;

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
    public function autocomplete()
    {
        $term = Str::upper(Input::get('term'));

        $data = Colonia::where('colonia', 'LIKE', '%'.$term.'%')->get();

        foreach ($data as $v) {
            $return_array[] = array('value'=>$v->id,'label' => $v->zipcode.' - '.$v->colonia);
        }
        
        return Response::json($return_array);
    }
    public function search(Request $request)
    {
        $query = $request->rfc;
        $pacientes = Paciente::where('rfc', '=', $query)->paginate(25);
        $pacientes->each(function($pacientes) {
              $pacientes->tipo;
        });
        
        return view('admin/pacientes/index')->with('pacientes', $pacientes);
    }
    public function repetidos()
    {
       $pacientes_ids = Cita::select('paciente_id')->lists('paciente_id')->toArray();
       $pacientes = Paciente::whereNotIn('id', $pacientes_ids)->get();
       foreach ($pacientes as $paciente) {
           echo $paciente->rfc.'/'.$paciente->id. ' - '.$paciente->nombres.'  '.$paciente->apellido_pat.'  '.$paciente->apellido_mat;
           echo '<br>';
           $pa = Paciente::find($paciente->id); 
           $pa->delete();
           echo 'Eliminado';
           echo '<br>';
       }
               
       
    }
}
