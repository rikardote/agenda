	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family: Helvetica; font-size: small; }
		.reporte{
			border-top: 1px solid black;
			border-middle:1px solid black;
			border-left: 1px solid black;
			border-right: 1px solid black;
			font-size: 14px;

		}
		.reporte2{
			border: 1px solid black;
			border-middle:1px solid black;
			border-left: 1px solid black;
			font-size: 24px;
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
	<table cellpadding="12" cellspacing="0" border="0">
		
		<tr>
			<td class="reporte" rowspan=2 height="53" align="left" valign=middle>HORA</td>
			<td class="reporte" style="width:12%;" rowspan=2 align="center" valign=middle>EXPEDIENTE</td>
			<td class="reporte" style="width:20%;" colspan=2 rowspan=2 align="center" valign=middle>NOMBRE DEL PACIENTE</td>
			<td class="reporte" colspan=2 align="center" valign=middle>VIGENCIA DERECHO</td>
			<td class="reporte" colspan=2 align="center" valign=middle>SEXO EDAD</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>FORANEO</td>
			<td class="reporte" colspan=3 align="center" valign=middle>SOLICITUD</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>PASE UNI</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>No. LIC MEDICA</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>NO. DIAS</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>NO. MED</td>
			<td class="reporte" style="width:25%;" colspan=2 align="center" valign=middle>DIAGNOSTICO</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>1RA VEZ</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>SUB SEC</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>REPROG</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>SUSP</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>DIFE</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>VISITA</td>
			<td class="reporte" rowspan=2 align="center" valign=middle>NO.OTOR</td>
		</tr>
		<tr>
			<td class="reporte" align="center" valign=middle>SI</td>
			<td class="reporte" align="center" valign=middle>NO</td>
			<td class="reporte" align="center" valign=middle>F</td>
			<td class="reporte" align="center" valign=middle>M</td>
			<td class="reporte" align="center" valign=middle>LAB.</td>
			<td class="reporte" align="center" valign=middle>RX</td>
			<td class="reporte" align="left" valign=middle>INTER CONS.</td>
			<td class="reporte" style="width:5%;" align="center" valign=middle>CODIGO CIE</td>
			<td class="reporte" style="width:15%;" align="center" valign=middle>DESCRIPCION</td>
			</tr>
		@foreach($cita as $cit)
		<tr >
		
			<td class="reporte2" height="20" align="left" valign=middle>{{$cit->horario}}</td>
			<td class="reporte2" align="left" valign=middle >{{$cit->paciente->rfc}} /{{$cit->paciente->tipo->code}}</td>
			<td class="reporte2" colspan=2 align="left" valign=middle >{{$cit->paciente->fullname}}</td>
			<td class="reporte2" align="center" valign=middle ></td>
			<td class="reporte2" align="center" valign=middle ><br></td>
			<td class="reporte2" align="center" valign=middle >
				@if ($cit->paciente->gender == 'F')
					
				@endif
			</td>
			<td class="reporte2" align="center" valign=middle>
				@if ($cit->paciente->gender == 'M')
					
				@endif
			</td>
			<td class="reporte2" align="center" valign=middle ><br>
				{{ getForaneo($cit->paciente->foraneo_id) }}

			</td>
			<td class="reporte2" align="center" valign=middle ></td>
			<td class="reporte2" align="center" valign=middle ></td>
			<td class="reporte2" align="center" valign=middle ><br></td>
			<td class="reporte2" align="center" valign=middle ><br></td>
			<td class="reporte2" align="center" valign=middle ></td>
			<td class="reporte2" align="center" valign=middle ></td>
			<td class="reporte2" align="center" valign=middle ></td>
			<td class="reporte2" align="center" valign=middle ></td>
			<td class="reporte2" align="center" valign=middle ><b><font size=1></td>
			<td class="reporte2" align="center" valign=middle >{{$cit->primera_vez ? 'x':''}}</td>
			<td class="reporte2" align="center" valign=middle ></td>
			<td class="reporte2" align="center" valign=middle ><br></td>
			<td class="reporte2" align="center" valign=middle ><br></td>
			<td class="reporte2" align="center" valign=middle ><br></td>
			<td class="reporte2" align="center" valign=middle ><br></td>
			<td class="reporte2" align="center" valign=middle ><br></td>
		</tr>
		@endforeach	
	</table>
	<div style='page-break-before:always;'>&nbsp;</div>	
@endforeach	





