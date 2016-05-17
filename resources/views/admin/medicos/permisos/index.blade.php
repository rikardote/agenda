@extends('layouts.app')

@section('title', 'Permisos y Vacaciones de medicos')

@section('content')

  <a data-url="{{ route('medico.permisos.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
   <table class="table table-striped table-condensed">
    <thead>
        <th>Medico</th>
        <th>Fecha Inicio</th>
        <th>Fecha Final</th>

        <th>Accion</th>
    </thead>
    <tbody>

    @foreach($permisos as $permiso)
        <tr>
             <td>{{ $permiso->medico->fullname}}</td>
             <td>{{ fecha_dmy($permiso->fecha_inicio) }}</td>
             <td>{{ fecha_dmy($permiso->fecha_final) }}</td>

             <td>
                 <a data-url="{{ route('medico.permisos.edit', $permiso->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
                   <span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
                </a> 
                <a href="{{ route('medico.permisos.destroy', $permiso->id) }}" ><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
             </td>
        </tr>
    @endforeach
    </tbody>
</table>

@include('admin.partials.form-modal', ['title'=>'Agregar/Editar Medicos'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])

@endsection