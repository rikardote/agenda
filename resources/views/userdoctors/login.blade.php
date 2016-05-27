
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>AgendaElectronica</title>
    
    
    
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">

       <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    
    
    
  </head>

  <body>

    <div class="login-form">
      <img src="fotos/issste_simple.png" alt="">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/doctor/login') }}">
      <div class="form-group ">
       {!! csrf_field() !!}
       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
       </div>
       <i class="fa fa-user"></i>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} log-status">
      
       <input type="password" class="form-control" placeholder="Contraseña" name="password">
       <i class="fa fa-lock"></i>
      
      

      <span class="alert"> 
        @if ($errors->has('password'))
          <span class="help-block">
           <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      
      </span>
      </div>
      <button type="submit" class="log-btn">
        <i class="fa fa-btn fa-sign-in"></i> Acceder
      </button>
   </form>    
   <br> 
    <div align="center">
    <h1>Modulo de Medicos</h1>
    </div>
   </div>


    <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>
    <script src="{{ asset('js/shake.js') }}"></script>
    
  </body>
  
</html>
