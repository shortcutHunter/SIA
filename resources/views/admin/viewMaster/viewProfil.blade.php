@extends('layouts.adminSB')

@section('title', 'Profil')


@section('css')
     <!-- Bootstrap Core Css -->
     <link href="{{ asset ('adminSB/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

     <!-- Waves Effect Css -->
     <link href="{{ asset ('adminSB/plugins/node-waves/waves.css')}}" rel="stylesheet" />
 
     <!-- Animation Css -->
     <link href="{{ asset ('adminSB/plugins/animate-css/animate.css')}}" rel="stylesheet" />
 
     <!-- Morris Chart Css-->
     <link href="{{ asset ('adminSB/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ asset ('adminSB/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
 
     <!-- Custom Css -->
     <link href="{{ asset ('adminSB/css/style.css')}}" rel="stylesheet">
 
     <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
     <link href="{{ asset ('adminSB/css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection

@section('main-content')

<section class="content">
    <div class="container-fluid">
        <!-- Horizontal Layout -->
        
        <div class="m-b-10">
            <a href="/admin/edit/profil" class="btn btn-danger">
                <i class="material-icons">mode_edit</i> Edit
            </a>
            <a href="/admin/edit/password" class="btn btn-danger">
                <i class="material-icons">lock</i> Ganti Password
            </a>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h1>
                           @switch($user_type)
                                @case('dosen')
                                    {{Auth::user()->kode_dosen->nama_dosen}}
                                @break
                           
                                @default
                                   {{Auth::user()->nama_user}}
                           @endswitch
                        </h1>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            @switch($user_type)
                                @case('dosen')
                                    
                                @break

                                @default
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <div class="big-font">{{Auth::user()->email}}</div>
                                </div>
                            @endswitch
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- #END# Horizontal Layout -->
    </div>
</section>
@endsection


@section('js')
    <!-- Jquery Core Js -->
    <script src="{{ asset('adminSB/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('adminSB/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('adminSB/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('adminSB/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('adminSB/plugins/node-waves/waves.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('adminSB/js/admin.js') }}"></script>
    <script src="{{ asset('adminSB/js/pages/forms/advanced-form-elements.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('adminSB/js/demo.js') }}"></script>
@endsection