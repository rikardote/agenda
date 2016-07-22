@extends('layouts.app')

@section('title', 'Agendas Medica')

@section('content')

<div class="row">
	@foreach($especialidades as $especialidad)
		<div class="col-md-6 col-md-4">
			<a href="{{ route('agenda.show', $especialidad->slug) }}">
				<div class="w3-card-8 w3-green panel panel-primary">
					<h4 class="text-white text-center">{{ $especialidad->name }}</h4>
				</div>
			</a>
		</div>
	@endforeach
</div>



@endsection