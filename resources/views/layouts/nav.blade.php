<nav class="navbar navbar-inverse">
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
                    AgendaElectronica
                </a>
            </div>
        
            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if(Auth::user())
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                            <a href="{{route('agenda.index')}}"> Agenda     </a>
                    </li>
                     @if(Auth::user()->admin())
                     <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Medicos <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('medicos.index')}}">Consultar Medicos</a></li>
                                <li><a href="{{route('especialidades.index')}}">Especialidades</a></li>
                                <li><a href="{{route('horarios.index')}}">Horarios</a></li>
                            </ul>
                        </li>

                    <li class="">
                            <a href="{{route('pacientes.index')}}">Pacientes </a>
                            
                    </li>
                    
                    
                    @endif
                    
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
                                @if(Auth::user()->admin())
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