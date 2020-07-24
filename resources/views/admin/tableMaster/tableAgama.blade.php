@extends('layouts.adminSB')

@section('title', 'Input Agama')


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
<input type="hidden" name="table" value="master_agamas">

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-red">
                <li class="breadcrumb-item">TABLE AGAMA</li>
            </ol>
        </div>
        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>TABLE AGAMA</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row col-sm-12">
                                    <div class="dt-buttons">
                                        <a class="btn btn-danger waves-effect" href="/admin/inputagama/create">
                                            <i class="material-icons">add</i>
                                            <span>TAMBAH</span>
                                        </a>
                                        <button class="btn btn-danger waves-effect btn-delete-table">
                                            <i class="material-icons">delete</i>
                                            HAPUS
                                        </button>
                                        <div class="btn-group user-helper-dropdown">
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
                                                <li>
                                                    <a export_file="pdf" href="javascript:void(0);">PDF</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-danger waves-effect btn-import-table" data-type="prompt">
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
                                            Cari:
                                            <input type="search" class="form-control input-sm">
                                        </label>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#table" data-toggle="tab">
                                            <i class="material-icons">border_all</i> Table
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#log" data-toggle="tab">
                                            <i class="material-icons">history</i> Logs
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="table">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 10px">
                                                        <input type="checkbox" id="checkall" class="filled-in chk-col-red"/>
                                                        <label for="checkall"></label>
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1">
                                                        Nama Agama
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($agamas as $key=>$agama)
                                                    <tr>
                                                        <td>
                                                            <input id="check{{$agama->id}}" type="checkbox" value="{{$agama->id}}" class="filled-in chk-col-red table_check"/>
                                                            <label for="check{{$agama->id}}"></label>
                                                        </td>
                                                        <td class="view-info" row_id="{{ $agama->id }}">
                                                            {{$agama->nama_agama}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="dataTables_paginate paging_simple_numbers pull-right" id="DataTables_Table_1_paginate">
                                            <ul class="pagination">
                                                {{ $agamas->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade in" id="log">
                                        @foreach ($logs as $log)
                                            <div class="media">
                                                {{-- <div class="media-left">
                                                    <a href="javascript:void(0);">
                                                        <img class="media-object" src="http://placehold.it/64x64" width="64" height="64">
                                                    </a>
                                                </div> --}}
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{$log->description}}</h4>
                                                    @if ($log->description == 'Mass delete')
                                                        @foreach ($log->properties as $key => $values)
                                                            <div class="row clearfix">
                                                                <div class="col-sm-1">
                                                                    <label>{{$key}}</label>
                                                                </div>
                                                                <div class="col-sm-11">
                                                                    <table>
                                                                        @foreach ($values as $k => $val)
                                                                            <tr>
                                                                                <td>{{$val}}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        @foreach ($log->changes as $key => $values)
                                                            <div class="row clearfix">
                                                                <div class="col-sm-1">
                                                                    <label>{{$key}}</label>
                                                                </div>
                                                                <div class="col-sm-11">
                                                                    <table>
                                                                        @foreach ($values as $k => $val)
                                                                            @if($val)
                                                                                <tr>
                                                                                    <td>{{ $k }}</td>
                                                                                    <td class="p-l-10 p-r-10">=</td>
                                                                                    <td>{{$val}}</td>
                                                                                </tr>
                                                                            @endif
                                                                            
                                                                        @endforeach
                                                                    </table>
                                                                    
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif                                                   
                                                    
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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

    <!-- Custom Js -->
    <script src="{{ asset('adminSB/js/admin.js') }}"></script>
    <script src="{{ asset('adminSB/js/pages/ui/notifications.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

@endsection