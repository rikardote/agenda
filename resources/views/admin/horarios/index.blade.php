@extends('layouts.app')

@section('title', 'Horarios')

@section('content')

<a data-url="{{ route('horarios.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
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
            <a data-url="{{ route('horarios.edit', $horario->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
               <span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
            </a> 
            <a href="{{ route('admin.horarios.destroy', $horario->id) }}"><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('admin.partials.form-modal', ['title'=>'Agregar/Editar Horarios'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])
@endsection
