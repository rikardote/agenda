@extends('layouts.app')

@section('title', 'Horarios')

@section('content')

{!! link_to_route('horarios.create', 'Nuevo Horario', [], ['class' => 'btn btn-info'])  !!}
   <table class="table table-striped">
    <thead>
        <th>Nombre</th>

        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($horarios as $horario)
        <tr>
         <td>{{ $horario->name }}</td>
        
         
         <td>
            <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning"><span class="fa fa-pencil-square-o" aria-hidden="true"></span></a>
            <a href="{{ route('admin.horarios.destroy', $horario->id) }}" class="btn btn-danger"><span class="fa fa-trash" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
