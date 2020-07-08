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
 
     <!-- Custom Css -->
     <link href="{{ asset ('adminSB/css/style.css')}}" rel="stylesheet">
 
     <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
     <link href="{{ asset ('adminSB/css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection

@section('main-content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">DATA AGAMA</li>
              </ol>
            </nav>
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
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-copy buttons-html5" href="/admin/inputagama/create"><span>Add</span></a>
                                    <a class="dt-button buttons-csv buttons-html5" href="#"><span>CSV</span></a>
                                    <a class="dt-button buttons-excel buttons-html5" href="#"><span>Excel</span></a>
                                    <a class="dt-button buttons-pdf buttons-html5" href="#"><span>PDF</span></a>
                                    <a class="dt-button buttons-print" href="#"><span>Print</span></a>
                                </div>
                                <div id="DataTables_Table_1_filter" class="dataTables_filter">
                                    <label class="pull-right">
                                        Search:
                                        <input type="search" class="form-control input-sm">
                                    </label>
                                </div>
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1">
                                                No.
                                            </th>
                                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1">
                                                Nama Agama
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1"></th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">No.</th>
                                            <th rowspan="1" colspan="1">Nama Agama</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        @foreach($agamas as $key=>$agama)
                                            <tr>
                                                <td>{{($agamas->perPage() * ($agamas->currentPage()-1))+$key+1}}</td>
                                                <td>{{$agama->nama_agama}}</td>
                                                <td>
                                                    <form action="{{ url('/admin/inputagama', ['id' => $agama->id]) }}" method="POST" class="d-inline">
                                                        <button class="btn btn-danger" type="submit"><i class="material-icons">delete</i></button>
                                                        @method('delete')
                                                        @csrf
                                                    </form>
                                                    <a href="/admin/inputagama/{{ $agama->id }}/edit" class="btn btn-warning">
                                                        <i class="material-icons">edit</i>
                                                    </a>
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