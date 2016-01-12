@extends('layouts.app')

@section('title', 'Especialidades')

@section('content')

{!! link_to_route('especialidades.create', 'Nueva Especialidad', [], ['class' => 'btn btn-info'])  !!}
   <table class="table table-striped">
    <thead>
        <th>Nombre</th>

        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($especialidades as $especialidad)
        <tr>
         <td>{{ $especialidad->name }}</td>
        
         
         <td>
            <a href="{{ route('especialidades.edit', $especialidad->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
            <a href="{{ route('admin.especialidades.destroy', $especialidad->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
