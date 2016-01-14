@extends('layouts.app')

@section('title', 'Dr. ' . $medico->apellido_pat . ' ' . $medico->apellido_mat . ' ' . $medico->nombres . ' / ' . $medico->especialidad->name)

@section('content')
@if($paciente)
	Paciente: 
	<br>
	<br>
	{{ $paciente->nombres }} {{ $paciente->apellido_pat }} {{ $paciente->apellido_mat }}
	<br>
	<br>
	{!! Form::open(['route' => 'citas.store', 'method' => 'POST', 'class' => 'datepickerform']) !!}
		@include('admin.citas.form')
		{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@else
	No se encontraron datos con ese RFC
@endif
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
    dateFormat: 'dd/mm/yy',
    changeMonth: true,
    changeYear: true,
    firstDay: 1,
    onSelect: function () {
    	 var Path = document.URL;
            window.open(Path + '?date=' + this.value, '_self',false);
        }
    
});

</script> 

@endsection