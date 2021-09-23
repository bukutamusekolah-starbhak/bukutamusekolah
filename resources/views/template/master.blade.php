<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('sufee-admin-dashboard-master/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('sufee-admin-dashboard-master/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('sufee-admin-dashboard-master/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('sufee-admin-dashboard-master/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('sufee-admin-dashboard-master/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('sufee-admin-dashboard-master/vendors/jqvmap/dist/jqvmap.min.css')}}">


    <link rel="stylesheet" href="{{asset('sufee-admin-dashboard-master/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
    @yield('css')
</head>

<body>
    @include('template.component.sidebar')
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        @include('template.component.navbar')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>@yield('titlesatu')</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">@yield('titledua')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
        @yield('content')
        </div>
        </div>
        </div>
        </div>
        </div>   
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="{{asset('sufee-admin-dashboard-master/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('sufee-admin-dashboard-master/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('sufee-admin-dashboard-master/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('sufee-admin-dashboard-master/assets/js/main.js')}}"></script>
    <script src="{{asset('sufee-admin-dashboard-master/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('sufee-admin-dashboard-master/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('sufee-admin-dashboard-master/assets/js/widgets.js')}}"></script>
    <script src="{{asset('sufee-admin-dashboard-master/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('sufee-admin-dashboard-master/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('sufee-admin-dashboard-master/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    @stack('script')
    <script>
        (function($) {
            "use strict";
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
</body>
</html>
