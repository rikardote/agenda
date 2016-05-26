	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:100%; }
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
		<colgroup width="79"></colgroup>
		<colgroup width="136"></colgroup>
		<colgroup width="79"></colgroup>
		<colgroup width="194"></colgroup>
		<colgroup span="4" width="79"></colgroup>
		<colgroup width="32"></colgroup>
		<colgroup span="3" width="79"></colgroup>
		<colgroup width="37"></colgroup>
		<colgroup span="4" width="79"></colgroup>
		<colgroup width="139"></colgroup>
		<colgroup span="7" width="79"></colgroup>
		<tr>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 height="53" align="left" valign=middle><font color="#000000">HORA</font></td>
			<td style="width:8%;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">EXPEDIENTE</font></td>
			<td style="width:20%;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=2 align="center" valign=middle><font color="#000000">NOMBRE DEL PACIENTE</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom><font color="#000000">VIGENCIA <br>DERECHO</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom><font color="#000000">SEXO<br>EDAD</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">FORANEO</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=bottom><font color="#000000">SOLICITUD</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=bottom><font color="#000000">PASE-U</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">No. SERIE<br>LIC MEDICA</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">NO.DIAS</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">NO. MED</font></td>
			<td style="width:15%;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=bottom><font color="#000000">DIAGNOSTICO</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">1RAVEZ</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">SUB-SEC</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">REPROG</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">SUSP</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">DIFE</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">VISITA</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><font color="#000000">NO.OTOR</font></td>
		</tr>
		<tr>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><font color="#000000">SI</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><font color="#000000">NO</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><font color="#000000">F</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><font color="#000000">M</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><font color="#000000">LAB.</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom><font color="#000000">RX</font></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><font color="#000000">INTER<br>CONS.</font></td>
			<td style="width:5%;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">CODIGO CIE</font></td>
			<td style="width:10%;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font color="#000000">DESCRIPCION</font></td>
			</tr>
		@foreach($cita as $cit)
		<tr>
		
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=bottom bgcolor="#FFFFFF" sdval="0.333333333333333" sdnum="1033;1033;H:MM"><font color="#000000">{{$cit->horario}}</font></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">{{$cit->paciente->rfc}} /{{$cit->paciente->tipo->code}}</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">{{$cit->paciente->fullname}}</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">X</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF" sdval="35" sdnum="1033;"><b><font color="#000000">35</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">X</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">X</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">200LM3640604</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF" sdval="28" sdnum="1033;"><b><font color="#000000">28</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF" sdval="4" sdnum="1033;"><b><font color="#000000">4</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">S82.2</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font size=1 color="#000000">AMNZ PARTO PRE NO ESP</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">X</font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><br></font></b></td>
		</tr>
		@endforeach	
	</table>
	<div style='page-break-before:always;'>&nbsp;</div>	
@endforeach	





