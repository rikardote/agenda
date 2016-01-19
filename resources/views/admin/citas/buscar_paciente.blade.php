<div class="container">
	Asignar cita para el {{ \Carbon\Carbon::createFromFormat('Y-m-d', $date)->formatLocalized('%A %d de %B del %Y') }}
	{!! Form::open(['route' => ['pacientes.search', $medico->slug, $date], 'method' => 'get']) !!}
	
		<div class="form-group">
		<div class="col-md-4">
			<input type="text" class="form-control" name="rfc" placeholder="Buscar paciente por RFC">
		    <input type="hidden" date={{$date}}>
		</div>
		<div class="col-md-6">
		    <button class="btn btn-success" type="submit">Buscar</button>
		</div>
		</div>
	{!! Form::close() !!}

</div>


