@if(isset($permiso))
	
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($permiso, ['route' => ['medico.permisos.update', $permiso->id], 'method' => 'PATCH']) !!}
	 @include('admin.medicos.permisos.form_edit')
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'medico.permisos.store', 'method' => 'POST']) !!}
	 @include('admin.medicos.permisos.form')
@endif
     
<div align="right">
     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
 </div>
    {!! Form::close() !!}
<script>
$.datepicker.setDefaults($.datepicker.regional['es-MX']);
    $( "#fecha_inicio" ).datepicker({
      dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        firstDay: 1,

  });
 $.datepicker.setDefaults($.datepicker.regional['es-MX']);
    $( "#fecha_final" ).datepicker({
      dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        firstDay: 1,

  });
 </script>