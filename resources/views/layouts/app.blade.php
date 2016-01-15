<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mi Agenda</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/jquery-bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    @include('layouts.nav')
    <section>
        <div class="container spark-screen">
             <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">@yield('title')</div>
                        <div class="panel-body">
                            @include('flash::message')
                            @include('layouts.errors')
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   

    <!-- JavaScripts -->
    <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/ui.datepicker-es-MX.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('js')
    
</body>
</html>
