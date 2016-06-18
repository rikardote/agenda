@extends('layouts.doctores')

@section('title', 'Codigos CIE-10')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/media/css/datatables.bootstrap.min.css') }}">
@endsection

@section('content')

<a data-url="{{ route('codigos.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
   <table class="table table-condensed table-bordered" cellspacing="0" width="100%" id="myTable">
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


