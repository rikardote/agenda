@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')

{!! link_to_route('pacientes.create', 'Alta de Paciente', [], ['class' => 'btn btn-info'])  !!}
   <table class="table table-striped">
    <thead>
        <th>RFC</th>
        <th>Nombre</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($pacientes as $paciente)
        <tr>
         <td>{{ $paciente->rfc }}</td>
         <td>{{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} {{ $paciente->nombres }}</td>
        
         
         <td>
            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning"><span class="fa fa-pencil-square-o" aria-hidden="true"></span></a>
            <a href="{{ route('admin.pacientes.destroy', $paciente->id) }}" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
