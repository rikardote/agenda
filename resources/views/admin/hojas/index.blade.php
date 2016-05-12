@extends('layouts.doctores')

@section('title','Citas para HOY del DR. '.$medico->fullname.'<div class="pull-right">'.fecha_dmy($fecha).'<a href="/hojas/'.$fecha.'/avanzar"> >> </a></div>')

@section('content')
<table class="table table-striped">
	<thead>
		<th>HORARIO</th>
		<th>RFC</th>
		<th>NOMBRE</th>
		<th>Accion</th>
	</thead>
	<tbody>
		@foreach($citas as $cita)
		{{--*/ $tachado = ($cita->concretada == 1) ? "tachado" : "" /*--}}
			<tr class='{{$tachado}}'>
				<td>{{$cita->horario}}</td>
				<td><a href="{{route('custom.hojas.create',[$cita->paciente->id, $medico->id, $cita->id])}}">{{$cita->paciente->rfc}} /{{$cita->paciente->tipo->code}}</a></td>
				<td>{{$cita->paciente->fullname}}</td>
				<td>
				<a class="load-form-modal panelColorGreen"
                data-url="{{ route('hoja.citas.edit', [2 , $fecha, $cita->id]) }}" 
                data-toggle ="modal" data-target='#form-modal'><span class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></span>
              </a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@include('admin.partials.form-modal', ['title'=>'Cita para el dia: '.fecha_dmy($fecha)])
@endsection