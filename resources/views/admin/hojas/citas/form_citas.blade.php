{!! Form::open(['route' => ['medicos.cita.store'], 'method' => 'POST', 'class' => 'datepickerform']) !!}
	@include('admin.hojas.citas.form')
	{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
{!! Form::close() !!}
