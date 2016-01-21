		@if(isset($paciente))
			<?php $estado = 'Actualizar';  ?>
			{!! Form::model($paciente, ['route' => ['pacientes.update', $paciente->id], 'method' => 'PATCH']) !!}
		@else
			<?php $estado = 'Registrar';  ?>
			{!! Form::open(['route' => 'pacientes.store', 'method' => 'POST']) !!}
		@endif
		      @include('admin.pacientes.form')
<div align="right">

		     {!! Form::submit($estado, ['class' => 'btn btn-success']) !!}
</div>
		    {!! Form::close() !!}

