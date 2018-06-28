<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Certifymy-Sales-Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

  {!!Html::style('css/style.css')!!}
  {!!Html::style('css/bootstrap.min.css')!!}
  <!-- Font Awesome -->
  {!!Html::style('css/font-awesome.min.css')!!}
  <!-- Ionicons -->
  {!!Html::style('css/ionicons.min.css')!!}
  <!-- datatables -->
  {!!Html::style('css/jquery.dataTables.css')!!}
  <!-- ('css/dataTables.bootstrap.min.css') -->

  {!!Html::style('sweetalert2/dist/sweetalert2.min.css')!!}

  <!-- Theme style -->
  {!!Html::style('css/AdminLTE.min.css')!!}
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->

  {!!Html::style('css/skin-blue.min.css')!!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  @yield('style')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('layout.header')
  @include('layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

      @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
    
    </div>
    <!-- Default to the left -->
    <strong>CERTIFYMY (M) SDN BHD 2018</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->

{!!Html::script('js/jquery-2.2.3.min.js')!!}
{!!Html::script('js/jquery.validate.min.js')!!}
<!-- Bootstrap 3.3.6 -->
{!!Html::script('js/bootstrap.min.js')!!}
<!-- AdminLTE App -->
{!!Html::script('js/app.min.js')!!}
<!-- datatable -->
{!!Html::script('js/jquery.dataTables.min.js')!!}
{!!Html::script('js/ckeditor.js')!!}
<!--
{!!Html::script('js/dataTables.bootstrap.min.js')!!}
-->
{!!Html::script('sweetalert2/dist/sweetalert2.min.js')!!}

@include('sweet::alert')

 @yield('script')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
