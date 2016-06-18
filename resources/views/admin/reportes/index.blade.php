@extends('layouts.app')

@section('title', 'Reporte Diario de Citas Medicas')

@section('content')
	<div id='datepicker'></div>
@endsection
@section('js')
 <script>
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        firstDay: 1,
        onSelect: function () {
            var Path = window.location.pathname;
            window.open(Path + '?date=' + this.value, '_self',false);
        }

  });
    
  </script>
  @endsection

