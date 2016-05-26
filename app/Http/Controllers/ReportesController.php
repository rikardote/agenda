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

    	//dd($citas);
		$citas = $citas->sortBy('horario')->groupBy('medico_id');

    	//return view('admin.reportes.show')->with('citas', $citas)->with('date', $date);

    	$mpdf = new mPDF('', 'Letter', 0, '', 12.7, 12.7, 14, 12.7, 8, 8);
        //$header = \View('reportes.header', compact('dpto', 'qna'))->render();
        //$mpdf->SetFooter($dpto->description.'|Generado el: {DATE j-m-Y} |Hoja {PAGENO} de {nb}');
        $html =  \View('admin.reportes.show')->with('citas', $citas)->with('date', $date)->render();
        $pdfFilePath = 'Citas del '.fecha_dmy($date).'.pdf';
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';
        //$mpdf->setHTMLHeader($header);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
   
        $mpdf->Output($pdfFilePath, "D");
    }
}
