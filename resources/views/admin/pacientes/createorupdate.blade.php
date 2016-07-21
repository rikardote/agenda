		@if(isset($paciente))
			<?php $estado = 'Actualizar';  ?>
			{!! Form::model($paciente, ['route' => ['pacientes.update', $paciente->id], 'method' => 'PATCH']) !!}
			 @include('admin.pacientes.formU')
		@else
			<?php $estado = 'Registrar';  ?>
			{!! Form::open(['route' => 'pacientes.store', 'method' => 'POST']) !!}
			 @include('admin.pacientes.formR')
		@endif
		     
<div align="right">

		     {!! Form::submit($estado, ['class' => 'btn btn-success btn-block']) !!}
</div>
		    {!! Form::close() !!}


	<script>
		$('#dob').datetextentry();
	</script>
	<script>
        $(document).ready(function () {
            $('input:text').bind({
            });
            $("#autocomplete").autocomplete({
                minLength:3,
                source: '/getColonias'
            });
        });
    </script>
