@foreach($citas as $cita)
	@foreach($cita as $cit)
		{{$cit->medico->especialidad->name}}
		<br>
		{{$cit->medico->fullname}}
		{{fecha_dmy($date)}}
		<?php break; ?>
	@endforeach
	<table style="font-family:family:Arial; width: 100%";>
		<tr style="background-color: rgb(171,165,160);  ">
			<td>Folio</td>
			<td>RFC</td>
			<td>Nombre</td>
			<td>Horario</td>
		</tr>
		@foreach($cita as $cit)
		<tr>
			<td>{{$cit->id}}</td>
			<td>{{$cit->paciente->rfc}} /{{$cit->paciente->tipo->code}}</td>
			<td>{{$cit->paciente->fullname}}</td>
			<td>{{$cit->horario}}</td>
		</tr>
		@endforeach	

	</table>
	<div style='page-break-before:always;'>&nbsp;</div>	
@endforeach	