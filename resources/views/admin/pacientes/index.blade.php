@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')
  <a data-url="{{ route('pacientes.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
  
<div class="pull pull-right">
    <div class="col-md-8">
    {!! Form::open(['route' => ['admin.pacientes.search'], 'method' => 'post']) !!}
      <input  type="text" class="form-control" name="rfc" placeholder="Buscar paciente por RFC">
    </div>
    <div class="col-md-2">
      <button class="btn btn-success" type="submit">Buscar</button>
    </div>
    {!!Form::close()!!}
    
  </div>  

   <table class="table table-striped table-condensed">
   
    <thead>
        <th>RFC</th>
        <th>Nombre</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @if($pacientes)
      @foreach($pacientes as $paciente)
          <tr>
          <td>{{ $paciente->rfc }} /{{$paciente->tipo->code}}</td>
           <td>{{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }} {{ $paciente->nombres }}</td>
          
           
           <td>
              <a data-url="{{ route('pacientes.edit', $paciente->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
                  <span class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></span>
              </a>
              
              <?php $array = ['01','02','90','91'];  ?>
             <!-- <a href="{{ route('admin.pacientes.destroy', $paciente->id)}}"/>Borrar</a> -->
              @if($paciente->fecha_nacimiento == "1969-12-31" && in_array($paciente->tipo->code, $array))
                !
              @endif
           </td>
          </tr>
      @endforeach
    @endif
   
    </tbody>
</table>
{!! $pacientes->render() !!}

@include('admin.partials.form-modal', ['title'=>'Agregar/Editar Pacientes'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])

@endsection
