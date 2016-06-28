@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')
  <a data-url="{{ route('pacientes.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
   <table class="table table-striped table-condensed">
    <thead>
        <th>RFC</th>
        <th>Nombre</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($pacientes as $paciente)
        <tr>
        <td>{{ $paciente->rfc }} /{{$paciente->tipo->code}}</td>
         <td>{{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} {{ $paciente->nombres }}</td>
        
         
         <td>
            <a data-url="{{ route('pacientes.edit', $paciente->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
                <span class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></span>
            </a>
            <a href="{{ route('admin.pacientes.destroy', $paciente->id) }}" <span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
            @if($paciente->fecha_nacimiento == "1969-12-31")
              !
            @endif
         </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $pacientes->render() !!}

@include('admin.partials.form-modal', ['title'=>'Agregar/Editar Pacientes'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])

@endsection
