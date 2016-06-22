<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CodigosRequest;
use App\Cie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Response;

use Laracasts\Flash\Flash;

class CodigosController extends Controller
{
    function __construct()
   {
    $this->middleware('auth:doctors');
   }

    public function index()
    {	
    	$codigos = Cie::all();

        
    	return view('admin/codigos/index')->with('codigos', $codigos);
    }

    public function create()
    {
        return view('admin.codigos.createorupdate');
    }

    public function edit($id)
    {
        $codigo = Cie::find($id);
        
        return view('admin.codigos.createorupdate')->with('codigo', $codigo);
    }

    public function update(Request $request, $id)
    {
        $codigo = Cie::find($id);
        $codigo->fill($request->all());

        $codigo->save();
        Flash::success('Codigo Cie editado con exito!');
        return redirect()->route('codigos.index');
    }

    public function store(CodigosRequest $request)
    {
        $codigo = new Cie($request->all());
        $codigo->save();

        Flash::success('Codigo registrado con exito!');
        return redirect()->route('codigos.index');
    }  

    public function destroy($id)
    {
        $codigo = Cie::find($id);
        $codigo->delete();

        Flash::error('El Codigo ha sido borrado con exito!');
        return redirect()->route('codigos.index');
    } 
    public function autocomplete()
    {
        $term = Str::upper(Input::get('term'));

        $data = Cie::where('description', 'LIKE', '%'.$term.'%')->get();

        foreach ($data as $v) {
            $return_array[] = array('value'=>$v->code,'label' => $v->description);
        }
        
        return Response::json($return_array);
    }
}
