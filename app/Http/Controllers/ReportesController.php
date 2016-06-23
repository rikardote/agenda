<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Paciente;
use App\Medico;
use App\Tipo;
use App\Cita;
use \mPDF;

class ReportesController extends Controller
{
    public function index()
    {
    	if (isset($_GET["date"])) {
            $date = $_GET["date"];
            return redirect()->route('reporte.pdf', ['date' => $date]); 
        }
        else
        {
       	   return view('admin.reportes.index');
        }
 	}
    public function pdf($date)
    {
    	$citas = Cita::where('fecha', '=', $date)->get();
    	$citas->each(function($citas) {
            $citas->medico->especialidad;
            $citas->paciente->tipo;
        });

    	//
		$citas = $citas->sortBy('horario')->groupBy('medico_id');

    	//$mpdf = new mPDF('', array(340,216));
        $mpdf = new mPDF('',array(340,216), 0, '', 15, 15, 16, 16, 9, 9, 'L');
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
}
