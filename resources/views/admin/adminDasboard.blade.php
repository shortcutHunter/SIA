@extends('layouts.adminSB')

@section('title', 'Your Title')


@section('css')
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
@endsection

@section('main-content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae officiis iusto laudantium molestias, hic nam, quos ipsa quaerat sunt rem repellat quibusdam nulla aliquam, dignissimos repudiandae esse earum aperiam blanditiis.
                            </p>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus magnam quae, harum quo hic reiciendis laboriosam doloremque placeat, facilis ratione sunt, ullam ut. Quas natus impedit tempore ipsa perferendis aspernatur.
                            </p>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium debitis inventore, ipsum ducimus corporis? Neque, tenetur consequuntur quia, facere reiciendis dolorem. Unde rerum ab accusantium accusamus dolores error quam harum!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
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
@endsection