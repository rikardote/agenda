@extends('layouts.app')

@section('title', 'Agendas Medica')

@section('content')

	<table>

		@foreach($especialidades as $especialidad)
			<div class="col-md-6">
  			<div class="panel panel-default">
  				<div class="panel-body">
						<a href="{{ route('agenda.show', $especialidad->slug) }}">
							<h3 class="text-center">{{ $especialidad->name }}</h3>
						</a>
					</div>
				</div>
			</div>

		@endforeach


@endsection