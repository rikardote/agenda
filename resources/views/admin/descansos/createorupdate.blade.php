@if(isset($dia))
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($dia, ['route' => ['dianohabil.update', $dia->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'dianohabil.store', 'method' => 'POST']) !!}
@endif
      @include('admin.descansos.form')
<div align="right">
     {!! Form::submit($estado, ['class' => 'btn btn-success btn-block']) !!}
</div>  
    {!! Form::close() !!}
