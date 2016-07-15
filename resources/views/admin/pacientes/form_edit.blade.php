{!! Form::open(['route' => ['admin.pacientes.update', $slug, $date, $paciente->id], 'name' => 'formulario', 'method' => 'PATCH']) !!}
<div class="row">
	<div class="col-md-6">
		<div class="form-group">

		{!! Form::label('rfc', 'RFC') !!}
		
		{!! Form::text('rfc', $paciente->rfc, [
			
			'class' => 'form-control',
			'placeholder' => 'Ingresar RFC', 
			'required'
		]) !!}

		{!! Form::label('tipo', 'Tipo') !!}
		{!! Form::select('tipo_id', $tipos, $paciente->tipo_id, [
			'class' => 'form-control',
			'placeholder' => 'Selecciona un tipo', 
			'required'
		]) !!}

		{!! Form::label('gender', 'Sexo') !!}
		{!!	Form::select('gender', array('F' => 'FEMENINO', 'M' => 'MASCULINO'), $paciente->gender, [
			'class' => 'form-control',
			'placeholder' => 'Selecciona el genero', 
			'required'
		]) !!}

		{!! Form::label('nombres', 'Nombres') !!}
		
		{!! Form::text('nombres', $paciente->nombres, [
			
			'class' => 'form-control',
			'placeholder' => 'Nombres', 
			'required'
		]) !!}

		{!! Form::label('apellido_pat', 'Apellido Paterno') !!}
		
		{!! Form::text('apellido_pat', $paciente->apellido_pat, [
			
			'class' => 'form-control',
			'placeholder' => 'Apellido Paterno', 
			'required'
		]) !!}

		{!! Form::label('apellido_mat', 'Apellido Materno') !!}
		
		{!! Form::text('apellido_mat', $paciente->apellido_mat, [
			
			'class' => 'form-control',
			'placeholder' => 'Apellido Materno', 
			'required'
		]) !!}
		</div>	
	</div>
	<div class="col-md-6">	
		<div class="form-group">
			{!! Form::label('foraneo_id', 'Ubicacion') !!}
			{!!	Form::select('foraneo_id', array('1' => 'Mexicali', '2' => 'Ensenada', '3' => 'Tijuana', '4' => 'San Luis R.C', '5' => 'Tecate', 'Delta', 'Algodones', 'San Felipe'), $paciente->foraneo_id, [
				'class' => 'form-control',
				'placeholder' => 'Selecciona ubicación', 
				'required'
			]) !!}
			{!! Form::label('phone', 'Telefono Movil') !!}
			
			{!! Form::text('phone', isset($paciente->phone) ? $paciente->phone:null, [
				
				'class' => 'form-control',
				'placeholder' => 'Telefono Movil', 
				
			]) !!}
			{!! Form::label('phone_casa', 'Telefono Fijo') !!}
			
			{!! Form::text('phone_casa', isset($paciente->phone_casa) ? $paciente->phone_casa:null, [
				
				'class' => 'form-control',
				'placeholder' => 'Telefono Fijo', 
				
			]) !!}
			{!! Form::label('address', 'Direccion') !!}
			
			{!! Form::text('address', isset($paciente->address) ? $paciente->address:null, [
				
				'class' => 'form-control',
				'placeholder' => 'Direccion', 
				
			]) !!}
			{!! Form::label('colonia_id', 'Colonia') !!}
			
			

			{!! Form::text('colonia_id',  isset($paciente->colonia_id) ? $paciente->colonia_id:null, [
				'id' => 'autocomplete',
				'class' => 'form-control',
				'placeholder' => 'Colonia', 
				
			]) !!}
			<p>{{ ($paciente->colonia_id != 0) ? strtoupper($paciente->colonia->colonia):null}}</p>
			{!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
			<br>
			{!! Form::text('fecha_nacimiento', $paciente->fecha_nacimiento, [
				'class' => 'form-control',
				
				'id' => 'dob',
				'style' => 'width: 10em;'
			]) !!}

			</div>	
				
		</div>	
</div>
<div align="right">
				{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}

			</div>	
			{!!Form::close()!!}	

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
<script>
	function cambiar()
	{
		var index=document.forms.formulario.tipo_id.selectedIndex;
		
		formulario.gender.length=0;
		if(index==1) sexoM();
		if(index==2) sexoF();
		if(index==3) sexoF();
		if(index==4) sexoM();
		if(index==5) sexoM();
		if(index==6) sexoF();
		if(index==7) sexoM();
		if(index==8) sexoF();
		if(index==9) sexoF();
		if(index==10) sexoM();
		if(index==11) sexoM();
		if(index==12) sexoF();
		if(index==13) sexoM();
		if(index==14) sexoF();
		if(index==15) sexoV();
		
		
	}
function sexoF(){
opcion0=new Option("FEMENINO","F","defauldSelected");

document.forms.formulario.gender.options[0]=opcion0;

}
function sexoM(){
opcion0=new Option("MASCULINO","M","defauldSelected");

document.forms.formulario.gender.options[0]=opcion0;

}
function sexoV(){
opcion0=new Option("FEMENINO","F","defauldSelected");
opcion1=new Option("MASCULINO","M");
document.forms.formulario.gender.options[0]=opcion0;
document.forms.formulario.gender.options[1]=opcion1;

}
</script>
