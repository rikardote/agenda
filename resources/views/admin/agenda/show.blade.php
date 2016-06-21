@extends('layouts.app')

@section('title', 'Agenda de ')

@section('content')

<div class="row">
	@foreach($medicos as $medico)
		<div class="col-md-6 col-md-4">
			<div class="w3-card-12 w3-green panel panel-primary">
				<a href="{{ route('admin.citas.show', [$medico->slug, $date]) }}">
						<strong><h5 class="text-white text-center">Dr. {{ $medico->apellido_pat }} {{ $medico->apellido_mat }} {{ $medico->nombres }}</h5></strong>
						<div align="center"> {{$medico->consultorio->name}} </div>
					</a>
			</div>
		</div>
	@endforeach
</div>

@endsection