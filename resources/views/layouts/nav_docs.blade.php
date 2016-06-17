<nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
               
                <a class="navbar-brand" href="{{ route('hojas.index') }}">
                    <img style="display: inline-block; height: 55px; margin-top: -15px"
                     src="http://192.161.59.137/agenda/public/fotos/issste_simple.png">
                </a>
               
            </div>
        
            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                
                <ul class="nav navbar-nav">
                    <li><a href="{{route('codigos.index')}}">Codigos Cie</a></li>
                    <li><a href="{{route('hojas.index')}}">Hoja Medica</a></li>
                    <li class="dropdown {{ Request::segment(1) === 'reportes' ? 'active' : null }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Reportes <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('reporte.hoja_medica')}}">Reporte Diario de Citas</a></li>
                        </ul>
                    </li>
                </ul>
          
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('doctors')->user() ? Auth::guard('doctors')->user()->email:"" }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/doctor/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                  
                </ul>
            </div>
        </div>
    </nav>
    @include('admin.partials.form-modal', ['title'=>'Asignar Citas'])