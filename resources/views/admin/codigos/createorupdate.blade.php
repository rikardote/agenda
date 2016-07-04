@if(isset($codigo))
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($codigo, ['route' => ['codigos.update', $codigo->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'codigos.store', 'method' => 'POST']) !!}
@endif
      @include('admin.codigos.form')
<div align="right">
     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
</div>  
    {!! Form::close() !!}
