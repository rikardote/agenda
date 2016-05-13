@extends('layouts.app')

@section('title', 'Usuarios Medicos')

@section('content')
	<a data-url="{{ route('registrar_medicos.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
	    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
	</a> 
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Email</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($users_doctor as $user)
			<tr>
				<td>{{$user->medico->Fullname}}</td>
				<td>{{$user->email}}</td>
				<td>
            		<a data-url="{{ route('registrar_medicos.edit', $user->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
               			<span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
            		</a> 
            		<a href="{{ route('registrar_medicos.destroy', $user->id) }}"><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
         		</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@include('admin.partials.form-modal', ['title'=>'Agregar/Editar Usuarios Medicos'])
	@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])
@endsection

