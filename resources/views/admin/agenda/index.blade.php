@extends('layouts.app')

@section('title', 'Agendas Medica')

@section('content')

<div class="row">
	@foreach($especialidades as $especialidad)
		<div class="col-md-6" id="contenedor-mains">
			<div class="panel panel-default" id="contenedor-ma">
				<div class="panel-body">
 					<a href="{{ route('agenda.show', $especialidad->slug) }}">
						<h4 class="text-center">{{ $especialidad->name }}</h4>
					</a>
				</div>
			</div>
		</div>
	@endforeach
</div>

{!! $especialidades->render() !!}


@endsection