<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <!-- Icons-->
    <link href="{!! asset('node_modules/@coreui/icons/css/coreui-icons.min.css'); !!}" rel="stylesheet">
    <link href="{!! asset('node_modules/flag-icon-css/css/flag-icon.min.css'); !!}" rel="stylesheet">
    <link href="{!! asset('node_modules/font-awesome/css/font-awesome.min.css'); !!}" rel="stylesheet">
    <link href="{!! asset('node_modules/simple-line-icons/css/simple-line-icons.css'); !!}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{!! asset('css/style.css'); !!}" rel="stylesheet">
    <link href="{!! asset('vendors/pace-progress/css/pace.min.css'); !!}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
     @include('includes.header')
    <div class="app-body">
        @include('includes.sidebar')         
      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="container-fluid">
         @yield('content')
        </div>
      </main>      
    </div>
    <!-- Bootstrap and necessary plugins-->
    <script src="{!! url('/node_modules/jquery/dist/jquery.min.js'); !!}"></script>
    <script src="{!! url('/node_modules/popper.js/dist/umd/popper.min.js'); !!}"></script>
    <script src="{!! url('/node_modules/bootstrap/dist/js/bootstrap.min.js'); !!}"></script>
    <script src="{!! url('/node_modules/pace-progress/pace.min.js'); !!}"></script>
    <script src="{!! url('/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js'); !!}"></script>
    <script src="{!! url('/node_modules/@coreui/coreui/dist/js/coreui.min.js'); !!}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{!! url('/node_modules/chart.js/dist/Chart.min.js'); !!}"></script>
    <script src="{!! url('node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js'); !!}"></script>
    <script src="{!! url('/js/main.js'); !!}"></script>
  </body>
</html>