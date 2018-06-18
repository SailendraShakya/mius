<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <!-- Icons-->
    <link href="{!! url('node_modules/@coreui/icons/css/coreui-icons.min.css'); !!}" rel="stylesheet">
    <link href="{!! url('node_modules/flag-icon-css/css/flag-icon.min.css'); !!}" rel="stylesheet">
    <link href="{!! url('node_modules/font-awesome/css/font-awesome.min.css'); !!}" rel="stylesheet">
    <link href="{!! url('node_modules/simple-line-icons/css/simple-line-icons.css'); !!}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{!! url('css/style.css'); !!}" rel="stylesheet">
    <link href="{!! url('vendors/pace-progress/css/pace.min.css'); !!}" rel="stylesheet">
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
   @yield('content')
    </div>
    <!-- Bootstrap and necessary plugins-->
    <script src="{!! url('/node_modules/jquery/dist/jquery.min.js'); !!}"></script>
    <script src="{!! url('/node_modules/popper.js/dist/umd/popper.min.js'); !!}"></script>
    <script src="{!! url('/node_modules/bootstrap/dist/js/bootstrap.min.js'); !!}"></script>
    <script src="{!! url('/node_modules/pace-progress/pace.min.js'); !!}"></script>
    <script src="{!! url('/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js'); !!}"></script>
    <script src="{!! url('/node_modules/@coreui/coreui/dist/js/coreui.min.js'); !!}"></script>
  </body>
</html>