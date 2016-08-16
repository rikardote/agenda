<div  class="container">
	Asignar cita para el {{ \Carbon\Carbon::createFromFormat('Y-m-d', $date)->formatLocalized('%A %d de %B del %Y') }}
	{!! Form::open(['route' => ['pacientes.search', $medico->slug, $date], 'method' => 'get']) !!}
	
		<div class="form-group">
		<div class="col-md-4">
			<input  maxlength="10" id="text-input" type="text" class="form-control" name="rfc" placeholder="Buscar paciente por RFC / 10 digitos">
		    <input type="hidden" date={{$date}}>
		</div>
		<div class="col-md-6">
		    <button id="mySubmit" class="btn btn-success" type="submit">Buscar</button>
		</div>
		</div>
	{!! Form::close() !!}

</div>


<script>
$("#text-input").bind('paste', function(e) {
     var self = this;
     var paste = '';
          setTimeout(function(e) {
           rfc = $(self).val()
            var rfc_letras = '';
            var rfc_numero = '';
            rfc = rfc.replace(/[^a-z0-9]/gi,'');
            rfc_letras = rfc.substring(0,4);
            rfc_numero = rfc.substring(4,10); 
            if(rfc.length === 10 && (!/[^a-zA-Z]/.test(rfc_letras)) && (!/[^0-9]/.test(rfc_numero)) ) {
                document.getElementById("mySubmit").disabled = false;
                document.getElementById("text-input").value = rfc;

            }else{
               document.getElementById("mySubmit").disabled = true;
            }
          }, 0);
});

$('#text-input').keypress(function(e){
    var key = e.which;
    return ((key >= 48 && key <= 57) || (key >= 65 && key <= 90) || (key >= 95 && key <= 122) || key == 13);
});

$("#text-input").on('input', function(evt) {
  var input = $(this);
  var start = input[0].selectionStart;
  $(this).val(function (_, val) {
    return val.toUpperCase();
  });
  input[0].selectionStart = input[0].selectionEnd = start;
});

document.getElementById("mySubmit").disabled = true;


$('input[type="text"]').on('keyup',function() {
    var rfc = $('input[name="rfc"]').val();
    var rfc_letras = '';
    var rfc_numero = '';
    rfc = rfc.replace(/[^a-z0-9]/gi,'');
    rfc_letras = rfc.substring(0,4);
    rfc_numero = rfc.substring(4,10); 
    if(rfc.length === 10 && (!/[^a-zA-Z]/.test(rfc_letras)) && (!/[^0-9]/.test(rfc_numero)) ) {
        document.getElementById("mySubmit").disabled = false;
        document.getElementById("text-input").value = rfc;

    }else{
       document.getElementById("mySubmit").disabled = true;
    }
});

function isset ( strVariableName ) { 

    try { 
        eval( strVariableName );
    } catch( err ) { 
        if ( err instanceof ReferenceError ) 
           return false;
    }

    return true;

 } 
</script>