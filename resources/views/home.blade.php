<!DOCTYPE html>
<html lang="en">
{{-- for head --}}
<head>
    @include('Template.head')
    <title>Buku Tamu Smk Taruna Bhakti</title>
</head>
{{-- end head --}}
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper" id="welcome">

<!-- for Navbar -->
@include('Template.navbar')
<!-- end /.navbar -->

<!-- Main Sidebar Container -->
@include('Template.sidebar')
{{-- end Sidebar Container --}}

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pt-5">
<div class="container-fluid">
    <router-view></router-view>
</div>
</div>
<!-- end /.content-wrapper -->
@include('Template.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
