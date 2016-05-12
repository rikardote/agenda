@extends('layouts.app')

@section('title', 'Codigos')

@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
@endsection

@section('content')

<a data-url="{{ route('codigos.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
   <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="myTable">
    <thead>
        <th>Codigo</th>

        <th>Descripcion</th>
    </thead>
    
</table>
@include('admin.partials.form-modal', ['title'=>'Agregar/Editar Codigos'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])
@endsection

@section('js')

@endsection


