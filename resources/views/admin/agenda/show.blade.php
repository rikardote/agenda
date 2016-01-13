@extends('layouts.app')

@section('title', 'Agenda de ')

@section('content')

			@foreach($medicos as $medico)
			<div class="col-md-6">
  			<div class="panel panel-default">
  				<div class="panel-body">
						<a href="{{ route('citas.consultar', $medico->slug) }}">
							<h3 class="text-center">Dr. {{ $medico->apellido_pat }} {{ $medico->apellido_mat }} {{ $medico->nombres }}</h3>
						</a>
					</div>
				</div>
			</div>

		@endforeach


@endsection