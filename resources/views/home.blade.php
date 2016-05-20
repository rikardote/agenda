
<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
<style>
 html, body {
  border: 0;
  padding: 0;
  margin: 0;
  height: 100%;
}

body {
  background: #F1F1F1;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 16px;
}

.panel{
	box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
	border-radius: 10px 10px 0 0;
}
</style>    
<div align="center" class="row">
	
	<div class="col-md-6">
		<div class="panel panel-primary">
			<a href="agenda/login"><img src="agenda/public/fotos/agenda.png" alt="Agendar Citas"></a>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-primary">
			<a href="agenda/doctor/login"><img src="agenda/public/fotos/doctor.png" alt="Hoja Medica"></a>
		</div>
	</div>
</div>