@extends('layouts.app')

@section('title', 'Programar Dias de Descanso')

@section('content')

<a data-url="{{ route('dianohabil.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
   <table class="table table-condensed">
    <thead>
        <th>Fecha</th>
        <th>Descripcion</th>
    </thead>
    <tbody>
    	@foreach($dias as $dia)
    		<tr>
    			<td>{{ fecha_dmy($dia->fecha) }}</td>
    			<td>{{ $dia->description }}</td>
    			 <td>
		            <a data-url="{{ route('dianohabil.edit', $dia->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
		               <span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
		            </a> 
		            <a href="{{ route('admin.descansos.destroy', $dia->id) }}"><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
		         </td>
    		</tr>
    	@endforeach
    </tbody>
</table>
@include('admin.partials.form-modal', ['title'=>'Agregar/Editar Dias'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])
@endsection

