	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family: Helvetica; font-size: small; }
		.reporte{
			border-top: 1px solid black;
			border-bottom:1px solid black;
			border-left: 1px solid black;
			border-right: 1px solid black;

		}
		.reporte2{
			border: 1px solid black;
			border-bottom:1px solid black;
			border-left: 1px solid black;
		}
	</style>
	
</head>

<body>
@foreach($citas as $cita)
	@foreach($cita as $cit)
				<h3>{{$cit->medico->especialidad->name}}
				    -  {{$cit->medico->fullname}}</h3>
		<?php break; ?>
	@endforeach
	<table cellspacing="0" border="0">
		
		<tr>
			<td class="reporte" rowspan=2 height="53" align="left" valign=middle>HORA</td>
			<td class="reporte" style="width:8%;" rowspan=2 align="center" valign=middle>EXPEDIENTE</td>
			<td class="reporte" style="width:20%;" colspan=2 rowspan=2 align="center" valign=middle>NOMBRE DEL PACIENTE</td>
			<td class="reporte" colspan=2 align="center" valign=bottom>VIGENCIA DERECHO</td>
			<td class="reporte" colspan=2 align="center" valign=bottom>SEXO EDAD</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>FORANEO</td>
			<td class="reporte" colspan=3 align="center" valign=bottom>SOLICITUD</td>
			<td class="reporte" rowspan=2 align="center" valign=bottom>PASE UNI</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>No. LIC MEDICA</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>NO. DIAS</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>NO. MED</td>
			<td class="reporte" style="width:25%;" colspan=2 align="center" valign=bottom>DIAGNOSTICO</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>1RA VEZ</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>SUB SEC</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>REPROG</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>SUSP</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>DIFE</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>VISITA</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>NO.OTOR</td>
		</tr>
		<tr>
			<td class="reporte" align="center" valign=bottom>SI</td>
			<td class="reporte" align="center" valign=bottom>NO</td>
			<td class="reporte" align="center" valign=bottom>F</td>
			<td class="reporte" align="center" valign=bottom>M</td>
			<td class="reporte" align="center" valign=bottom>LAB.</td>
			<td class="reporte" align="center" valign=bottom>RX</td>
			<td class="reporte" align="left" valign=bottom>INTER CONS.</td>
			<td class="reporte" style="width:3%;" align="center" valign=middle>COD CIE</td>
			<td class="reporte" style="width:19%;" align="center" valign=middle>DESCRIPCION</td>
			</tr>
		@foreach($cita as $cit)
		<tr>
		
			<td class="reporte2" height="20" align="left" valign=middle>{{$cit->horario}}</td>
			<td class="reporte2" style="font-size: 12px;"align="left" valign=middle >{{$cit->paciente->rfc}} /{{$cit->paciente->tipo->code}}</td>
			<td class="reporte2" style="font-size: 12px;" colspan=2 align="left" valign=middle >{{$cit->paciente->fullname}}</td>
			<td class="reporte2" align="center" valign=bottom ></td>
			<td class="reporte2" align="center" valign=bottom ><br></td>
			<td class="reporte2" align="center" valign=bottom >
				@if ($cit->paciente->gender == 'F')
					{{getEdad($cit->paciente->fecha_nacimiento)}}
				@endif
			</td>
			<td class="reporte2" align="center" valign=middle>
				@if ($cit->paciente->gender == 'M')
					{{$cit->age/*getEdad($cit->paciente->fecha_nacimiento)*/}}
				@endif
			</td>
			<td class="reporte2" align="center" valign=middle >{{$cit->foraneo? √:null}}<br></td>
			<td class="reporte2" align="center" valign=middle >{{$cit->laboratorio? √:null}}</td>
			<td class="reporte2" align="center" valign=middle >{{$cit->rayosx? √:null}}</td>
			<td class="reporte2" align="center" valign=middle >{{$cit->interconsulta? √:null}}<br></td>
			<td class="reporte2" align="center" valign=middle >{{$cit->pase_otra_unidad? √:null}}<br></td>
			<td class="reporte2" align="center" valign=middle >{{$cit->num_licencia_medica? $cit->num_licencia_medica:null}}</td>
			<td class="reporte2" align="center" valign=middle >{{$cit->num_de_dias? $cit->num_de_dias:null}}</td>
			<td class="reporte2" align="center" valign=middle >{{$cit->num_medicamentos? $cit->num_medicamentos:null}}</td>
			<td class="reporte2" align="center" valign=middle >{{$cit->codigo->code? $cit->codigo->code:null}}</td>
			<td class="reporte2" align="left" valign=middle >{{$cit->codigo->description? str_limit($cit->codigo->description, 45):null}}<b><font size=.5></td>
			<td class="reporte2" align="center" valign=middle >{{$cit->primera_vez? √:null}}<br></td>
			<td class="reporte2" align="center" valign=middle >{{$cit->subsecuente? √:null}}</td>
			<td class="reporte2" align="center" valign=middle >{{$cit->reprogramada? √:null}}<br></td>
			<td class="reporte2" align="center" valign=middle >{{$cit->suspendida? √:null}}<br></td>
			<td class="reporte2" align="center" valign=middle >{{$cit->diferida? √:null}}<br></td>
			<td class="reporte2" align="center" valign=middle>{{$cit->diferida? √:null}}<br></td>
			<td class="reporte2" align="center" valign=middle>{{$cit->num_otorgados? √:null}}<br></td>
		</tr>
		@endforeach	
	</table>
	<div style='page-break-before:always;'>&nbsp;</div>	
@endforeach	





