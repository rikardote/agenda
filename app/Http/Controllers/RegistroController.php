<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistroRequest;
use App\Especialidad;
use App\Tipo;
use App\User;
use Laracasts\Flash\Flash;



class RegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
        if (!\Auth::user()->admin()) {
            return redirect()->route('agenda.index');
        }
    	   $users = User::orderBy('type', 'DESC')->orderBy('name', 'ASC')->get();
    	
    	   return view('admin.users.index')->with('users', $users);
      
    }
    public function create(){
    	$especialidades = Especialidad::all()->lists('name', 'id')->toArray();

    	return view('admin.users.create')->with('especialidades', $especialidades);
    }
     public function edit($id){
     	$user = User::find($id);
     	$especialidades = Especialidad::all()->lists('name', 'id')->toArray();
     	$especialidades_select = $user->especialidades->lists('id')->toArray();
    	
    	return view('admin.users.edit')
    		->with('user', $user)
    		->with('especialidades', $especialidades)
    		->with('especialidades_select', $especialidades_select);
    }
    public function store(RegistroRequest $request){
    	$user = new User($request->all());
    	$user->password = bcrypt($request->password);
        $user->save();

        $user->especialidades()->sync($request->especialidades);

        Flash::success('Usuario registrado con exito!');
        return redirect()->route('registrar.index');
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
       

        $user->save();
		$user->especialidades()->sync($request->especialidades);

        Flash::success('Usuario editado con exito!');
        return redirect()->route('registrar.index');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::error('El usuario ' . $user->name . ' ha sido borrado con exito!');
        return redirect()->route('registrar.index');
    } 
    
}
