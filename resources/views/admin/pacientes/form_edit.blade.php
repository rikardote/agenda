{!! Form::open(['route' => ['admin.pacientes.update', $slug, $date, $paciente->id], 'name' => 'formulario', 'method' => 'PATCH']) !!}
<input type="hidden" name="_token" value={{ csrf_token() }} id="token">
<div class="row">
	<div class="col-md-6">
		<div class="form-group">

		{!! Form::label('rfc', 'RFC') !!}
		
		{!! Form::text('rfc', $paciente->rfc, [
			
			'class' => 'form-control',
			'placeholder' => 'Ingresar RFC',
			'id' => 'rfc',
			'required'
		]) !!}

		{!! Form::label('tipo', 'Tipo') !!}
		{!! Form::select('tipo_id', $tipos, $paciente->tipo_id, [
			'class' => 'form-control',
			'OnChange' => 'cambiar()',
			'placeholder' => 'Selecciona un tipo', 
			'id' => 'tipo',
			'required'
		]) !!}

		{!! Form::label('gender', 'Sexo') !!}
		{!!	Form::select('gender', array('F' => 'FEMENINO', 'M' => 'MASCULINO'), $paciente->gender, [
			'class' => 'form-control',
			'placeholder' => 'Selecciona el Género', 
			'id' => 'sexo',
			'required'
		]) !!}

		{!! Form::label('nombres', 'Nombres') !!}
		
		{!! Form::text('nombres', $paciente->nombres, [
			
			'class' => 'form-control',
			'placeholder' => 'Nombres', 
			'id' => 'nombres',
			'required'
		]) !!}

		{!! Form::label('apellido_pat', 'Apellido Paterno') !!}
		
		{!! Form::text('apellido_pat', $paciente->apellido_pat, [
			
			'class' => 'form-control',
			'placeholder' => 'Apellido Paterno', 
			'id' => 'apellido1',
			'required'
		]) !!}

		{!! Form::label('apellido_mat', 'Apellido Materno') !!}
		
		{!! Form::text('apellido_mat', $paciente->apellido_mat, [
			
			'class' => 'form-control',
			'placeholder' => 'Apellido Materno', 
			'id' => 'apellido2',
			'required'
		]) !!}
		</div>	
	</div>
	<div class="col-md-6">	
		<div class="form-group">
			{!! Form::label('foraneo_id', 'Ubicacion') !!}
			{!!	Form::select('foraneo_id', array('1' => 'Mexicali', '2' => 'Ensenada', '3' => 'Tijuana', '4' => 'San Luis R.C', '5' => 'Tecate', 'Delta', 'Algodones', 'San Felipe','Foraneos'), $paciente->foraneo_id, [
				'class' => 'form-control',
				'placeholder' => 'Selecciona ubicación', 
				'id' => 'ubicacion',
				'required'
			]) !!}
			{!! Form::label('phone', 'Telefono Movil') !!}
			
			{!! Form::text('phone', isset($paciente->phone) ? $paciente->phone:null, [
				
				'class' => 'form-control',
				'placeholder' => 'Teléfono Movil', 
				'id' => 'cel'
				
			]) !!}
			{!! Form::label('phone_casa', 'Teléfono Fijo') !!}
			
			{!! Form::text('phone_casa', isset($paciente->phone_casa) ? $paciente->phone_casa:null, [
				
				'class' => 'form-control',
				'placeholder' => 'Teléfono Fijo', 
				'id' => 'phone',
				
			]) !!}
			{!! Form::label('address', 'Direccion') !!}
			
			{!! Form::text('address', isset($paciente->address) ? $paciente->address:null, [
				
				'class' => 'form-control',
				'placeholder' => 'Direccion', 
				'id' => 'address',
				
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
				{!! link_to('#', $title='Registrar', $attributes= ['id' => 'register', 'class' => 'btn btn-primary btn-block'], $secure=null) !!} 

			</div>	
			{!!Form::close()!!}	

      <div id="searching_spinner_center"></div>

<script>
		$('#dob').datetextentry();
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
<script type="text/javascript">
	$('#register').click(function(){
	
		var frmrfc = $('#rfc').val();
		var frmtipo = $('#tipo').val();
		var frmsexo = $('#sexo').val();
		var frmnombres = $('#nombres').val();
		var frmapellido1 = $('#apellido1').val();
		var frmapellido2 = $("#apellido2").val();
		var frmubicacion = $("#ubicacion").val();
		var frmcel = $("#cel").val();
		var frmphone = $("#phone").val();
		var frmaddress = $("#address").val();
		var frmbirth = $("#dob").val();
		var token = $("#token").val();
		var route = "{{ route('admin.pacientes.update',[$slug, $date, $paciente->id]) }}";

		var dataString = 'rfc='+frmrfc+'&tipo_id='+frmtipo+'&gender='+frmsexo+'&nombres='+frmnombres+'&apellido_pat='+frmapellido1+'&apellido_mat='+frmapellido2+'&foraneo_id='+frmubicacion+'&phone='+frmcel+'&phone_casa='+frmphone+'&address='+frmaddress+'&fecha_nacimiento='+frmbirth; 
		
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'PATCH',
			data: dataString,
					 success: function(res) {
							var opts = {
									lines: 13 // The number of lines to draw
								, length: 0 // The length of each line
								, width: 14 // The line thickness
								, radius: 28 // The radius of the inner circle
								, scale: 1.25 // Scales overall size of the spinner
								, corners: 1 // Corner roundness (0..1)
								, color: '#000' // #rgb or #rrggbb or array of colors
								, opacity: 0.2 // Opacity of the lines
								, rotate: 25 // The rotation offset
								, direction: 1 // 1: clockwise, -1: counterclockwise
								, speed: 0.9 // Rounds per second
								, trail: 31 // Afterglow percentage
								, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
								, zIndex: 2e9 // The z-index (defaults to 2000000000)
								, className: 'spinner' // The CSS class to assign to the spinner
								, top: '45%' // Top position relative to parent
								, left: '50%' // Left position relative to parent
								, shadow: false // Whether to render a shadow
								, hwaccel: false // Whether to use hardware acceleration
								, position: 'absolute' // Element positioning
							}
							var target = document.getElementById('searching_spinner_center')
							var spinner = new Spinner(opts).spin(target);
							window.setTimeout(function(){location.reload()},getRandomizer(0,4000))
					   },
						 error: function (res) {
							var errors = '';
								for(datos in res.responseJSON){
										errors += res.responseJSON[datos] + '\n';
								}
							swal({
								title: "Error..!! ",   
								text: errors,   
								type: "error",   
								confirmButtonColor: "#DD6B55",   
								closeOnConfirm: true,
								timer: 3000

							 });
							
						 }

				});
				function getRandomizer(bottom, top) {
	        	return Math.floor( Math.random() * ( 1 + top - bottom ) ) + bottom;
	    	}
	}); 
</script>