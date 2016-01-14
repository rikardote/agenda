@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
	<a href="{{ route('citas.nueva_cita', $medico->slug) }}" class="btn btn-info">Nueva Cita</a>
@if(isset($citas))
 <table class="table table-striped">
    <thead>
        <th>Folio</th>
        <th>Fecha</th>
        <th>Paciente</th>
        <th>Horario</th>

        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($citas as $cita)
        <tr>
         <td>{{ $cita->id }}</td>
         <td>{{ fecha_dmy($cita->fecha) }}</td>
 		 <td>{{ $cita->paciente->apellido_pat }} {{ $cita->paciente->apellido_mat }} {{ $cita->paciente->nombres }}</td>
 		 <td>{{ $cita->horario }}</td>
        
         
         <td>
            <a href="{{ route('admin.citas.edit', [$medico->slug, $cita->id]) }}" class="btn btn-warning"><span class="fa fa-pencil-square-o" aria-hidden="true"></span></a>
            <a href="{{ route('admin.citas.destroy', [$medico->slug, $cita->id]) }}" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
   @else
   No hay citas asignadas
   @endif
</table>
	


@endsection