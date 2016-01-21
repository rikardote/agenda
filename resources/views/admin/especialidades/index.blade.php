@extends('layouts.app')

@section('title', 'Especialidades')

@section('content')

  <a data-url="{{ route('especialidades.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
  <table class= 'table table-striped'>
    <thead>
        <th>Nombre</th>

        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($especialidades as $especialidad)
        <tr>
         <td>{{ $especialidad->name }}</td>
        
         
         <td>
       
            <a data-url="{{ route('especialidades.edit', $especialidad->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
               <span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
            </a> 
            <a href="{{ route('admin.especialidades.destroy', $especialidad->id) }}"><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>

@include('admin.partials.form-modal', ['title'=>'Agregar/Editar Especialidad'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])

@endsection
