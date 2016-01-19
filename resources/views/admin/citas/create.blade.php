@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
@if($paciente)
	<strong>Paciente: </strong>
	<br>
	<br>

	{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }}
	<br>
	<br>
	{!! Form::open(['route' => ['admin.citas.store', $medico->slug, $date], 'method' => 'POST', 'class' => 'datepickerform']) !!}
		@include('admin.citas.form')
		{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@else
	No se encontraron datos con ese RFC
 <hr>
 <br>


 <a data-url="{{ route('admin.pacientes.create', [$medico->slug , $date, $_GET['rfc']]) }}" class="load-form-modal fa fa-pencil fa-2x" data-toggle ="modal" data-target='#form-modal'>
	Dar de alta al paciente con RFC: {{$_GET['rfc']}}?
 </a> 

@endif

@include('admin.partials.form-modal', ['title'=>'Form Modal'])
@include('admin.partials.confirmation_modal', ['title'=>'Confirmation Modal'])

@endsection

@section('js')
<script type="text/javascript">
  $(function() {
    $( "#fecha_inicial" ).datepicker();
  });
 </script>
 <script>
$.datepicker.setDefaults($.datepicker.regional['es-MX']);
$('#fecha_inicial').datepicker({
    dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeYear: true,
    firstDay: 1,
    
    
});

</script> 

@endsection