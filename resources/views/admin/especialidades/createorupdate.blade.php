
@if(isset($especialidad))
	<?php $estado = 'Actualizar';  ?>
	{!! Form::model($especialidad, ['route' => ['especialidades.update', $especialidad->id], 'method' => 'PATCH']) !!}
@else
	<?php $estado = 'Registrar';  ?>
	{!! Form::open(['route' => 'especialidades.store', 'method' => 'POST']) !!}
@endif
      @include('admin.especialidades.form')
    {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
  
    {!! Form::close() !!}

