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
                    <form action="/admin/update/profil" method="POST">
                        @csrf @method('PUT')

                        <div class="header">
                            <label for="nama_user">Nama</label>
                            <div class="form-group">
                                <h1 class="form-line">
                                    @switch($user_type)
                                        @case('dosen')
                                            <input type="text" class="form-control" id="nama_user" name="nama_dosen" value="{{Auth::user()->kode_dosen->nama_dosen}}" required="true">
                                        @break
                                   
                                        @default
                                            <input type="text" class="form-control" id="nama_user" name="nama_user" value="{{Auth::user()->nama_user}}" required="true">
                                   @endswitch
                                </h1>
                            </div>
                        </div>
                        <div class="body">
                            <input type="hidden" name="user_type" value="{{$user_type}}">
                            <div class="row clearfix">
                                
                                @switch($user_type)
                                    @case('dosen')
                                        
                                    @break

                                    @default
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control big-font" id="email" name="email" value="{{Auth::user()->email}}" required="true">
                                            </div>
                                        </div>
                                    </div>
                                @endswitch
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