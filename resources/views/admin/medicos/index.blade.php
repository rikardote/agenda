@extends('layouts.app')

@section('title', 'Medicos')

@section('content')

{!! link_to_route('medicos.create', 'Alta de Medico', [], ['class' => 'btn btn-info'])  !!}
   <table class="table table-striped">
    <thead>
        <th>Num Empleado</th>
        <th>Nombre</th>
        <th>Cedula</th>
        <th>Especialidad</th>
        <th>Horario</th>

        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($medicos as $medico)
        <tr>
         <td>{{ $medico->num_empleado }}</td>
         <td>{{ $medico->apellido_pat }} {{ $medico->apellido_mat }} {{ $medico->nombres }}</td>
         <td>{{ $medico->cedula }}</td>
         <td>{{ $medico->especialidad->name }}</td>
         <td>{{ $medico->horario->name }}</td>
        
         
         <td>
            <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-warning"><span class="fa fa-pencil-square-o" aria-hidden="true"></span></a>
            <a href="{{ route('admin.medicos.destroy', $medico->id) }}" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
