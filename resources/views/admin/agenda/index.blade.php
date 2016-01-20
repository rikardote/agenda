@extends('layouts.app')

@section('title', 'Agendas Medica')

@section('content')

<div class="row">
	@foreach($especialidades as $especialidad)
		<div class="col-md-6 col-md-4">
			<div class="w3-card-8 w3-blue  panel panel-primary">
				<a href="{{ route('agenda.show', $especialidad->slug) }}">
					<h4 class="text-center">{{ $especialidad->name }}</h4>
				</a>
			</div>
		</div>
	@endforeach
</div>

{!! $especialidades->render() !!}


@endsection