<!DOCTYPE html>
<html lang="id" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset ('adminSB/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset ('adminSB/plugins/node-waves/waves.css')}}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{ asset ('adminSB/plugins/animate-css/animate.css')}}" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="{{ asset ('adminSB/plugins/morrisjs/morris.css')}}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ asset ('adminSB/css/style.css')}}" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset ('adminSB/css/themes/all-themes.css')}}" rel="stylesheet" />
</head>
<body class="theme-red h-100 center-vertical-horizontal">
    
    <div class="container">
        <h1 class="text-center m-b-50">SIA Login</h1>
        <div class="center-vertical-horizontal">
            <div class="card col-sm-4">
                <div class="body center-vertical-horizontal">
                    <form class="form-horizontal" action="/login" method="POST" style="width: 100%">
                        @csrf
                        <div class="input-group m-t-20">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" name="nama_user" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="form-line">
                                <button type="submit" class="btn btn-danger btn-block m-t-15 waves-effect">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset ('adminSB/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset ('adminSB/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset ('adminSB/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset ('adminSB/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset ('adminSB/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset ('adminSB/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset ('adminSB/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset ('adminSB/plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{ asset ('adminSB/plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset ('adminSB/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{ asset ('adminSB/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset ('adminSB/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset ('adminSB/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{ asset ('adminSB/plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset ('adminSB/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ asset ('adminSB/js/admin.js')}}"></script>
    <script src="{{ asset ('adminSB/js/pages/index.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{ asset ('adminSB/js/demo.js')}}"></script>
</body>
</html>