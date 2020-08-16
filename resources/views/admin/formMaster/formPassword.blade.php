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
        
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <form action="/admin/update/password" method="POST">
                        @csrf @method('PUT')

                        <div class="header">
                            Ganti Password
                        </div>
                        <div class="body">
                            <div class="clearfix">

                                <label for="password_lama">Password lama</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="password_lama" name="password_lama" value="" required="true">
                                    </div>
                                </div>

                                <label for="password_baru">Password Baru</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="password_baru" name="password_baru" value="" required="true">
                                    </div>
                                </div>

                                <label for="konfirmasi_password_baru">Konfirmasi Password Baru</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="konfirmasi_password_baru" name="konfirmasi_password_baru" value="" required="true">
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button>
                            <a href="/admin/profil" class="btn btn-link m-t-15 waves-effect">BATAL</a>
                        </div>

                    </form>
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