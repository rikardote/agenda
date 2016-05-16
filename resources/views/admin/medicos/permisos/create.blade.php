@if(isset($medico))
	
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($medico, ['route' => ['medico.permisos.update', $medico->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'medico.permisos.store', 'method' => 'POST']) !!}
@endif
      @include('admin.medicos.permisos.form')
<div align="right">
     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
 </div>
    {!! Form::close() !!}

