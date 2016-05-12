@extends('layouts.doctores')

@section('title', 'Citas para Hoy del DR. '.$medico->fullname)

@section('content')
<table class="table table-striped">
	<thead>
		<th>HORARIO</th>
		<th>RFC</th>
		<th>NOMBRE</th>
	</thead>
	<tbody>
		@foreach($citas as $cita)
			<tr>
				<td>{{$cita->horario}}</td>
				<td><a href="{{route('custom.hojas.create',[$cita->paciente->id, $medico->id])}}">{{$cita->paciente->rfc}} /{{$cita->paciente->tipo->code}}</a></td>
				<td>{{$cita->paciente->fullname}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection