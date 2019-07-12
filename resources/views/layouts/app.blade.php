<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    {{--
    <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    {{--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/datatables.net-bs/css/buttons.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/plugins/iCheck/square/blue.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet"/>
</head>
@if(Auth::check())
<body class="hold-transition skin-blue sidebar-mini">
@else
<body class="hold-transition login-page">
    
@endif
    <div id="loader">
        <img src="{{ asset('images/loader.gif') }}" height="200">
    </div>
    <div class="wrapper">
        @auth
            @include('inc.header')
            @include('inc.sidebar')
            <div class="content-wrapper" style="min-height: 916px;">
        @endauth
                @include('inc.flash')
                @yield('content')
        @auth
            </div>
            @include('inc.footer')            
        @endauth
    </div>
    <!-- Scripts -->
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/jquery-ui/jquery-ui.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.buttons.min.js') }}" defer></script>    
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/buttons.colVis.min.js') }}" defer></script>    
    <script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/raphael/raphael.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/morris.js/morris.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}" defer></script>
    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" defer></script>
    <script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/jquery-knob/dist/jquery.knob.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/moment/min/moment.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" defer></script>
    <script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}" defer></script>
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}" defer></script>
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}" defer></script>
    <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}" defer></script>
    <script src="{{ asset('admin/dist/js/demo.js') }}" defer></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}" defer></script>
    <script src="{{ asset('js/validation.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

</body>
</html>