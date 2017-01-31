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
               
                <a class="navbar-brand" href="{{ route('agenda.index') }}">
                    <img style="display: inline-block; height: 55px; margin-top: -15px"
             src="/fotos/issste_simple.png">
             </a>
                
            </div>
        
            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if(Auth::user())
                <ul class="nav navbar-nav">
                    <li class="dropdown {{ Request::segment(1) === 'agenda' || Request::segment(1) === 'citas' ? 'active' : null  }}">
                            <a href="{{route('agenda.index')}}"> Agenda     </a>
                    </li>
                    <li class="{{ Request::segment(1) === 'bitacora' ? 'active' : null  }}">
                            <a href="{{route('bitacora.index')}}">Bitacora </a>
                            
                    </li>
                     
                     <li class="dropdown 
                        {{ Request::segment(1) === 'medicos' || Request::segment(2) === 'permisos' || 
                            Request::segment(1) === 'especialidades' || Request::segment(1) === 'horarios' ? 'active' : null  }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Medicos <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="{{ Request::segment(1) === 'medicos' ? 'active' : null  }}"><a href="{{route('medicos.index')}}">Consultar Medicos</a></li>
                                <li class="{{ Request::segment(1) === 'especialidades' ? 'active' : null  }}"><a href="{{route('especialidades.index')}}">Especialidades</a></li>
                                <li class="{{ Request::segment(1) === 'horarios' ? 'active' : null  }}"><a href="{{route('horarios.index')}}">Horarios</a></li>
                                <li class="{{ Request::segment(2) === 'permisos' ? 'active' : null  }}"><a href="{{route('medico.permisos.index')}}">Permisos</a></li>
                            </ul>
                        </li>

                    <li class="{{ Request::segment(1) === 'pacientes' ? 'active' : null  }}">
                            <a href="{{route('pacientes.index')}}">Pacientes </a>
                            
                    </li>
                    
                    <li class="dropdown {{ Request::segment(1) === 'reportes' ? 'active' : null }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Reportes <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('reporte.index')}}">Reporte Diario Citas</a></li>
                           <!-- <li><a href="">Reporte Diario VESPERTINO de Citas</a></li> -->
                        </ul>
                    </li>
                    
                    
                    
                    
                </ul>
                @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                       
                            <li><a href="{{ url('/login') }}">Login</a></li>
       
                        <li><a href="{{ url('/register') }}">Registrar</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                
                                    <li>
                                        <a href="{{ url('/themes') }}"><i class="fa fa-btn fa fa-cog"></i>Cambiar Tema</a>
                                    </li>
                                    @if(Auth::user()->admin())
                                    <li>
                                        <a href="{{ url('/dianohabil') }}"><i class="fa fa-btn fa fa-cog"></i>Dias no habiles</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/registrar') }}"><i class="fa fa-btn fa fa-cog"></i>Administrar Usuarios</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/registrar_medicos') }}"><i class="fa fa-btn fa fa-cog"></i>Administrar Medicos</a>
                                    </li>
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>