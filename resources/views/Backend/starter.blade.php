<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
@include('Backend.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 @include('Backend.navbar')
 @include('Backend.sidebar')

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


   @yield('content')
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@include('Backend.script')
</body>
</html>
