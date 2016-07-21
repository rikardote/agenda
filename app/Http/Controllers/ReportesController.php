<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Paciente;
use App\Medico;
use App\Tipo;
use App\User;
use App\Cita;
use \mPDF;
use Carbon\Carbon;

class ReportesController extends Controller
{
    public function index()
    {
            $user = User::find(\Auth::user()->id);
            $checked = explode(',',$user->medicos_user);
    	if (isset($_REQUEST["date"])) {
            $date = $_REQUEST["date"];

            $medicos = Medico::orderBy('apellido_pat', 'ASC')->get();
            
            return redirect()->route('reporte.pdf', ['date' => $date, 'medicos' => $medicos, 'checked' => $checked]); 
        }
        else
        {
            $medicos = Medico::orderBy('apellido_pat', 'ASC')->get();
            return view('admin.reportes.index')->with('medicos', $medicos)->with('checked', $checked);
        }
 	}
    /*
    public function vesp($turno) {
        if (isset($_GET["date"])) {
            $date = $_GET["date"];
            return redirect()->route('reporte.pdf', ['date' => $date,'turno' => $turno]); 


        }
        else
        {
           return view('admin.reportes.index');
        }   
    }*/
    public function pdf($date)
    {
    	if (isset($_REQUEST["date"])) {
            $date = $_REQUEST["date"];
            $user = User::find(\Auth::user()->id);
            $checked = $user->medicos_user;
            $medicos = Medico::orderBy('apellido_pat', 'ASC')->get();
            
            return redirect()->route('reporte.pdf', ['date' => $date, 'medicos' => $medicos, 'checked' => $checked]); 
        }
        else
        {
            $medicos = Medico::orderBy('apellido_pat', 'ASC')->get();
            return view('admin.reportes.index')->with('medicos', $medicos);
        }
        
    }

    public function hoja_medica_get()
    {
        if (isset($_GET["date"])) {
            $date = $_GET["date"];
            return redirect()->route('hoja_medica.pdf', ['date' => $date]); 
        }
        else
        {
           return view('admin.reportes.medicos_reports.index');
        }
    }
    public function hoja_medica_pdf($date)
    {
        $medico = Medico::find(\Auth::guard('doctors')->user()->doctor_id);

      
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
        $html =  \View('admin.reportes.medicos_reports.show')->with('citas', $citas)->with('date', $date)->render();
        $pdfFilePath = 'Citas del '.fecha_dmy($date).'.pdf';
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        $mpdf->setHTMLHeader($header);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
   
        $mpdf->Output($pdfFilePath, "I"); //D
        
    }
    public function medicos_checkbox(Request $request)
    {
        $citas = Cita::where('fecha', '=', $request->date)->whereIn('medico_id',$request->medicos)->get();
        $citas->each(function($citas) {
            $citas->codigo;
            $citas->medico->especialidad;
            $citas->paciente->tipo;
         });
      
        $citas = $citas->sortBy('horario')->groupBy('medico_id');

        $mpdf = new mPDF('', 'Legal-L');
        $header = \View('admin.reportes.header')->with('date', $request->date)->render();
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
    public function guardar_configuracion(Request $request)
    {   
        $user = User::find(\Auth::user()->id);

        $user->medicos_user = $request->checkbox;
        $user->save();
 
    }

}
