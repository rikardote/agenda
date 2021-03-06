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
     <link rel="stylesheet" href="{{ asset('css/bootswatch/lumen.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themesolar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datetextentry/datetextentry.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chosen-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/css/toastr.min.css') }}">

    @yield('css')
    <style type="text/css">
        .ui-autocomplete { max-height: 600px; overflow-y: scroll; overflow-x: auto; position: absolute;}
     </style>
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
    @include('layouts.nav_docs')
    <section>
        <div class="container spark-screen">
             <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">@yield('title')</div>
                        <div class="panel-body">

                            <div id="alert"> @include('flash::message')</div>
                            @include('layouts.errors')
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
<footer class="footer">
    <p class="text-muted text-white"> &copy;  {{date('Y')}} ISSSTE BAJA CALIFORNIA Por: Hector Ricardo Fuentes Armenta Ext. 53040</p>
</footer>
    <!-- JavaScripts -->
    <script src="{{ asset('plugins/jquery/js/jquery.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/js/ui.datepicker-es-MX.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('plugins/datetextentry/datetextentry.js') }}"></script>
    <script src="{{ asset('plugins/timepicker/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/extensions/Buttons/js/buttons.flash.min.js') }}"></script>
    
    @yield('js')
    <script>
        $(document).ready(function(){
             $('#myTable').DataTable({
                "language" : {"url" : "/plugins/datatables/localization/spanish.json"},
                "processing": true,
                "serverSide": true,
                "ajax": "api/codigos",
                "columns": [
                    {data: 'code'},
                    {data: 'description'},
                   ]
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input:text').bind({
            });
            $("#auto").autocomplete({
                minLength:3,
                source: '/getdata'
            });
        });
    </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
        $('#alert').delay(2000).fadeOut(800)
    </script>
  
     {!! Toastr::render() !!}
</body>
</html>
