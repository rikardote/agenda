@extends('layouts.app')

@section('title', 'Codigos')

@section('content')

<a data-url="{{ route('codigos.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
   <table class="table table-striped">
    <thead>
        <th>Codigo</th>

        <th>Descripcion</th>
    </thead>
    <tbody>
    @foreach($codigos as $codigo)
        <tr>
            <td>{{ $codigo->code }}</td>
            <td>{{ $codigo->description }}</td>
         
         <td>
            <a data-url="{{ route('codigos.edit', $codigo->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
               <span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
            </a> 
            <a href="{{ route('admin.codigos.destroy', $codigo->id) }}"><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('admin.partials.form-modal', ['title'=>'Agregar/Editar Codigos'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])
@endsection
