@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
	<a data-url="{{ route('registrar.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
	    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
	</a> 
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Email</th>
			<th>Rol</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->type}}</td>

				<td>
            		<a data-url="{{ route('registrar.edit', $user->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
               			<span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
            		</a> 
            		<a href="{{ route('registrar.destroy', $user->id) }}"><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
         		</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@include('admin.partials.form-modal', ['title'=>'Agregar/Editar Usuarios'])
	@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])
@endsection

