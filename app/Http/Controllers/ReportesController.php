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
}
