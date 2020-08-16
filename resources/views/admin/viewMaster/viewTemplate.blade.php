@extends('layouts.adminSB')

@section('title', config('title_page') ?? '')


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
        <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-red text-uppercase">
                <li class="breadcrumb-item"><a href="./">TABLE {{ config('title_page') ?? '' }}</a></li>
                <li class="breadcrumb-item active">VIEW {{ config('title_page') ?? '' }}</li>
            </ol>
        </div>
        
        {{-- button group --}}
        <div class="dt-buttons m-b-10">
            <a class="btn btn-danger waves-effect" href="./{{ $data->id }}/edit">
                <i class="material-icons">mode_edit</i>
                <span>Edit</span>
            </a>
            <form action="" method="POST" class="d-inline">
                <button class="btn btn-danger" type="submit"><i class="material-icons">delete</i> HAPUS</button>
                @method('delete')
                @csrf
            </form>
            {{-- <div class="btn-group user-helper-dropdown">
                <button type="button" class="btn btn-danger waves-effect" data-toggle="dropdown">
                    <i class="material-icons">unarchive</i>
                    EXPORT
                </button>
                <ul class="dropdown-menu pull-right">
                    <li><a href="/master_agamas/export/csv/{{$data->id}}">CSV</a></li>
                    <li><a href="/master_agamas/export/xlsx/{{$data->id}}">Excel</a></li>
                    <li><a href="/master_agamas/export/pdf/{{$agama->id}}">PDF</a></li>
                </ul>
            </div> --}}
            {{-- <a class="btn btn-danger waves-effect m-r-5" href="/admin/inputagama/create">
                <i class="material-icons">print</i>
                PRINT
            </a> --}}
        </div>

        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>{{ config('title_page') ?? '' }}</h2>
                    </div>
                    <div class="body">
                        @yield('view-content')

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                <label for="Agama">Updated</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <span>{{ $data->updated_at }}</span>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                <label for="Agama">Created</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <span>{{ $data->created_at }}</span>
                            </div>
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