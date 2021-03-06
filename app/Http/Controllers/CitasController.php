<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CitasRequest;
use App\Cita;
use App\Especialidad;
use App\Medico;
use App\Descanso;
use App\Paciente;
use App\Permiso;
use App\User;
use Carbon\Carbon;
use \mPDF;
use Alert;
use Response;

class CitasController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
        setlocale(LC_ALL,"es_MX.utf8");
        
    }

	public function show($slug,$date){
        //$nosetrabaja = ['2017-02-06','2017-03-20','2017-05-01','2017-05-05','2017-11-02','2017-11-20'];
        $nosetrabaja = Descanso::all()->lists('fecha')->toArray();
        
        if (isset($_GET["date"])) {
            $date = $_GET["date"];
        }
        $date = fecha_ymd($date);  
        $dia_semana = Carbon::parse($date);
        $today = Carbon::today();
        $dia_semana = $dia_semana->dayOfWeek;

        $today = $today->year.'-'.$today->month.'-'.$today->day;

        $medico = Medico::findBySlug($slug);
        $medico->consultorio;

        $diasconsulta_select = $medico->diasconsulta->lists('id')->toArray();
        $diaconsulta_select = $medico->diaconsulta->lists('id')->toArray();
        
        $permisos = Permiso::where('medico_id', '=', $medico->id)->get();
                
        $citas = Cita::orderBy('id', 'ASC')->where('medico_id', '=' , $medico->id)->where('fecha', '=', $date)->get();
        $citas->each(function($citas) {
            $citas->paciente;

        });
        $citas = $citas->sortBy('horario');
	      
        $todas_citas = Cita::getTotalCitas($medico->id, $date);
        
        $todaysrttotime= strtotime($today);
        $date2 = strtotime($date);
        $f_anterior = $date2 < $todaysrttotime ? 1:0;

        if (in_array($date, $nosetrabaja)) {
            $nosetrabaja = 1;
            $festivo = Descanso::where('fecha', '=', $date)->first();
        }
        else{
            $nosetrabaja = 0;
            $festivo = "";
        }
       
        return view('admin.citas.index')
            ->with('medico', $medico)
            ->with('citas', $citas)
            ->with('date', $date)
            ->with('date2', $date2)
            ->with('todas_citas', $todas_citas)
            ->with('permisos', $permisos)
            ->with('f_anterior', $f_anterior)
            ->with('dia_semana', $dia_semana)
            ->with('diasconsulta_select', $diasconsulta_select)
            ->with('diaconsulta_select', $diaconsulta_select)
            ->with('nosetrabaja', $nosetrabaja)
            ->with('festivo', $festivo);
       /* 
        $html = view('welcome')->with('medico', $medico)->with('citas', $citas)->with('date', $date)->render();

        return $this->pdf
            ->load($html)
            ->download();   
       */
	}

	public function nueva_cita($slug, $date)
    {
    	$medico = Medico::findBySlug($slug);
		$medico->especialidad;


        return view('admin.citas.buscar_paciente')->with('medico', $medico)->with('date', $date);
        	
    }

    public function edit($slug,$date,$id)
    {
        $cita = Cita::find($id);
        $cita->paciente;
        $intervaloPrimeravez = '["00:00", "00:00"]';
        $medico = Medico::findBySlug($slug);
        $medico->especialidad;
        $medico->horario;
        $minutes = $medico->minutes ?  $medico->minutes:20;
        $timeminutes = '+'.($minutes*4).' minutes';
        
        if(!\Auth::user()->admin()) {
            $intervaloPrimeravez = '["'.$medico->horario->entrada.'","'.date('H:i', strtotime($timeminutes, strtotime($medico->horario->entrada))).'"]';
        }
        $todas_citas = Cita::getTotalCitas($medico->id, $date);
        $horas_usadas = Cita::where('fecha', '=', $date)->where('medico_id', '=', $medico->id)->lists('horario', 'id')->toArray();
        $horas = array();

        foreach ($horas_usadas as $hora) {
            $horas[] = '["'.Carbon::createFromFormat('H:i', $hora)->toTimeString().'","'.Carbon::createFromFormat('H:i', $hora)->addMinutes($minutes)->toTimeString().'"]';          
        }
        $horas = implode(",",$horas);
        $entrada = $medico->horario->entrada;
        $salida = $medico->horario->salida;

            //var_dump($horas);
            $entrada = $medico->horario->entrada;
            $salida = $medico->horario->salida;

        return view('admin.citas.edit')
            ->with('cita', $cita)
            ->with('medico', $medico)
            ->with('date', $date)
            ->with('todas_citas', $todas_citas)
            ->with('horas', $horas)
            ->with('entrada', $entrada)
            ->with('salida', $salida)
            ->with('intervaloPrimeravez', $intervaloPrimeravez)
            ->with('minutes', $minutes);
        
    }

    public function update(Request $request, $slug,$date,$id)
    {

        $cita = Cita::find($id);
        $cita->fill($request->all());
        $cita->capturado_por  = \Auth::user()->id;
        $cita->fecha = fecha_ymd($request->fecha);
        $medico = Medico::findBySlug($slug);
        
        $total_citas = Cita::getTotalCitasCount($medico->id, $cita->fecha);
        if($total_citas) {
            Toastr::error('Error al asignar Cita, Agenda del dia: '.fecha_dmy($cita->fecha).' llena');
            return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $request->date]);    
        }
        else{
            $cita->save();            
        }
               
        //Toastr::success('Cita actualizada exitosamente');
        alert()->success('Exitosamente!!!', 'Cita re-agendada');
        return redirect()->route('admin.citas.show', ['slug' => $request->slug, 'date' => $date]);
 
    }

    public function store(CitasRequest $request, $slug, $date)
    {
        
        $cita = new Cita($request->all());
        $cita->fecha = fecha_ymd($request->fecha);
        $cita->capturado_por = \Auth::user()->id;

        $cita->folio = getRandomeStr(4);

        $medico = Medico::findBySlug($slug);
        $total_citas = Cita::getTotalCitasCount($medico->id, $cita->fecha);

        // Validando Citas Repetidas //
        $getCitas = Cita::where('paciente_id', '=', $request->paciente_id)->where('medico_id', '=', $medico->id)->where('fecha', '=', $cita->fecha)->count();

        if($total_citas) {
            //Toastr::error('Error al asignar Cita, Agenda del dia: '.fecha_dmy($cita->fecha).' llena');
            alert()->warning('Error al asignar Cita, Agenda Llena', 'Atencion')->autoclose(3500);
            return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $request->date]);    
        }
        if($getCitas)  {
            alert()->warning('Paciente ya tiene agendada una cita en esta fecha', 'Atencion')->autoclose(3500);
            //Toastr::error('Paciente ya tiene agendada una cita en esta fecha');
            return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $request->date]);    
        }
        else{
                $cita->save();            
        }

        //Toastr::success('Cita Agendada con exito');
        alert()->success('Exitosamente!!!', 'Cita agendada');
        return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $request->date]);
    }  
 
    public function destroy($slug, $date, $id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        //if ($cita->delete()){
          //  $response = array(
            //   'success' => 'true'
            //);
            //return Response::json($response,200); //redirect()->route('qnas.index');
      //  }
       
        //alert()->success('Success Message', 'Optional Title');
        return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $date]);
    } 
    public function concretada($slug,$date,$id)
    {
    	$cita = Cita::find($id);
   		if ($cita->concretada == 1) {
   			$cita->concretada = 0;
   		}
   		else{
   			$cita->concretada = 1;
   		}

       	$cita->save();
       
        $medico = Medico::findBySlug($slug);
        $medico->especialidad;
        Toastr::success('Cita Concretada');
        return redirect()->route('admin.citas.show', ['slug' => $slug, 'date' => $date]);
       
    }
    public function print($medico_id, $date)
    {
       $medico = Medico::find($medico_id);

      
        $citas = Cita::where('fecha', '=', $date)->where('medico_id', '=', $medico->id)->get();
        $citas->each(function($citas) {
            $citas->codigo;
            $citas->medico->especialidad;
            $citas->paciente->tipo;

        });
      
        $citas = $citas->sortBy('horario')->groupBy('medico_id');

        $mpdf = new mPDF('', 'Legal-L');
        $header = \View('admin.reportes.header')->with('date', $date)->render();
        $mpdf->SetFooter('Generado el: {DATE j-m-Y}| AgendaElectronica | &copy;'.date('Y').' ISSSTE BAJA CALIFORNIA');
        $html =  \View('admin.reportes.show')->with('citas', $citas)->with('date', $date)->render();
        $pdfFilePath = 'Citas del '.fecha_dmy($date).'.pdf';
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->setHTMLHeader($header);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
   
        $mpdf->Output($pdfFilePath, "I"); //D
    }

    public function getfecha()
    {
        $citas = Cita::orderBy('fecha', 'ASC')->where('fecha', '>','2016-12-31')->get();
        $citas->each(function($citas) {
            $citas->codigo;
            $citas->medico->especialidad;
            $citas->paciente->tipo;

        });
        return view('test.index')->with('citas', $citas);
    }
    
	
    
}
