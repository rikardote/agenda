<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<table class="table">
	<thead>
		<th>Fecha</th>
		<th>Paciente</th>
		<th>Medico</th>
		<th>Especialidad</th>
		<th>Capturado por</th>
		<th>Capturado el</th>
	</thead>
	<tbody>
		@foreach($citas as $cita)
			<tr>
				<td><small>{{ fecha_dmy($cita->fecha) }}</small></td>
				<td><small>{{ $cita->paciente->fullname }}</small></td>
				<td><small>{{ $cita->medico->fullname }}</small></td>
				<td><small>{{ $cita->medico->especialidad->name }}</small></td>
				<td><small>{{ capturadopor($cita->capturado_por) }}</small></td>
				<td><small>{{ $cita->created_at }}</small></td>
			</tr>
		@endforeach
	</tbody>
</table>
	
</body>
</html>