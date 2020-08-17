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

    <!-- Sweetalert Css -->
    <link href="{{ asset ('adminSB/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="{{ asset ('adminSB/plugins/dropzone/dropzone.css')}}" rel="stylesheet" />
 
     <!-- Custom Css -->
     <link href="{{ asset ('adminSB/css/style.css')}}" rel="stylesheet">
 
     <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
     <link href="{{ asset ('adminSB/css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection

@section('main-content')

<input type="hidden" name="token" value="{{ csrf_token() }}">
<input type="hidden" name="table" value="{{ $table_name ?? '' }}">

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-red">
                <li class="breadcrumb-item text-uppercase">Table {{ config('title_page') ?? '' }}</li>
            </ol>
        </div>
        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">Table {{ config('title_page') ?? '' }}</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row col-sm-12">
                                    <div class="dt-buttons">
                                        <a class="btn btn-danger waves-effect m-r-5" href="{{Request::url()}}/create">
                                            <i class="material-icons">add</i>
                                            <span>TAMBAH</span>
                                        </a>
                                        <button class="btn btn-danger waves-effect btn-delete-table m-r-5">
                                            <i class="material-icons">delete</i>
                                            HAPUS
                                        </button>
                                        <div class="btn-group user-helper-dropdown m-r-5">
                                            <button type="button" class="btn btn-danger waves-effect" data-toggle="dropdown">
                                                <i class="material-icons">unarchive</i>
                                                EXPORT
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a export_file="csv" href="javascript:void(0);">CSV</a>
                                                </li>
                                                <li>
                                                    <a export_file="xlsx" href="javascript:void(0);">Excel</a>
                                                </li>
                                                {{-- <li>
                                                    <a export_file="pdf" href="javascript:void(0);">PDF</a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                        <button class="btn btn-danger waves-effect btn-import-table m-r-5" data-type="prompt">
                                            <i class="material-icons">archive</i>
                                            IMPORT
                                        </button>
                                        {{-- <a class="btn btn-danger waves-effect" href="/admin/inputagama/create">
                                            <i class="material-icons">print</i>
                                            PRINT
                                        </a> --}}
                                    </div>
                                    <div id="DataTables_Table_1_filter" class="dataTables_filter">
                                        <label class="pull-right">
                                            <form class="input-group" action="" method="GET">
                                                <div class="form-line">
                                                    <input type="text" name="keyword" class="form-control date" placeholder="Cari..." value="{{$keyword}}">
                                                </div>
                                                <span class="input-group-addon">
                                                    <button class="btn btn-default p-b-0 p-t-0 p-r-5 p-l-5">
                                                        <i class="material-icons">search</i>
                                                    </button>
                                                </span>
                                            </form>
                                        </label>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#table" data-toggle="tab">
                                            <i class="material-icons">border_all</i> Table
                                        </a>
                                    </li>
                                    @can('AuthName', 'Log')
                                        <li>
                                            <a href="#log" data-toggle="tab">
                                                <i class="material-icons">history</i> Logs
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="table">
                                        @yield('table-content')
                                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="DataTables_Table_1_paginate">
                                            <ul class="pagination">
                                                {{ $datas->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                    @can('AuthName', 'Log')
                                        <div class="tab-pane fade in p-l-10 p-r-10 p-t-10 p-b-10" id="log" style="background: #e9e9e9">
                                            @foreach ($logs as $log)
                                                <div class="card">
                                                    <div class="header">
                                                        {{$log->description}} by {{$log->causer->nama_user}} 
                                                        <div class="text-muted small">{{$log->created_at}}</div>
                                                    </div>
                                                    <div class="body">
                                                        @switch($log->description)
                                                            @case('Mass delete')
                                                                <div class="d-flex">
                                                                    @foreach ($log->properties as $key => $values)
                                                                        <div class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="id = {{$values['id']}}">
                                                                            {{$values['name']}}
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @break
                                                            @case('Import')
                                                                <div class="d-flex">
                                                                    <table class="table table-bordered table-striped table-hover">
                                                                        @foreach ($log->properties as $key => $values)
                                                                            @foreach ($values as $k => $v)
                                                                                @if($key == 0)
                                                                                    <th>{{$k}}</th>
                                                                                @endif
                                                                                <tr>
                                                                                    <td>{{$v}}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </table>
                                                                </div>
                                                            @break
                                                            @case('updated')
                                                                <table>
                                                                    @foreach ($log->changes['old'] as $key => $item)
                                                                        <tr>
                                                                            <td class="font-bold">{{$key}}</td>
                                                                            <td class="p-l-10 p-r-10">:</td>
                                                                            <td>{{$item}}</td>
                                                                            <td class="p-l-10 p-r-10">-></td>
                                                                            <td>{{$log->changes['attributes'][$key]}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </table>
                                                            @break
                                                            @default
                                                            <table>
                                                                @foreach ($log->changes['attributes'] as $key => $item)
                                                                    <tr>
                                                                        <td class="font-bold">{{$key}}</td>
                                                                        <td class="p-l-10 p-r-10">:</td>
                                                                        <td>{{$item}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        @endswitch
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endcan
                                </div>
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

    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ asset('adminSB/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('adminSB/plugins/node-waves/waves.js') }}"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="{{ asset('adminSB/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{ asset('adminSB/plugins/dropzone/dropzone.js') }}"></script>

    <!-- Tooltip & Popover Js -->
    <script src="{{ asset('adminSB/js/pages/ui/tooltips-popovers.js') }}"></script>


    <!-- Custom Js -->
    <script src="{{ asset('adminSB/js/pages/ui/notifications.js') }}"></script>
    <script src="{{ asset('adminSB/js/admin.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

@endsection