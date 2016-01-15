@extends('layouts.app')

@section('title', 'Agenda de ')

@section('content')

<div class="row">
	@foreach($medicos as $medico)
		<div class="col-md-6" id="contenedor-mains">
  			<div class="panel panel-default" id="contenedor-ma">
  				<div class="panel-body">
					<a href="{{ route('admin.citas.show', [$medico->slug, $date]) }}">
						<strong><h5 class="text-center">Dr. {{ $medico->apellido_pat }} {{ $medico->apellido_mat }} {{ $medico->nombres }}</h5></strong>
					</a>
				</div>
			</div>
		</div>
	@endforeach
</div>

@endsection