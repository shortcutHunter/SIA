@extends('admin.viewMaster.viewTemplate')

@section('view-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label>Mata Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->master_mata_kuliah->nama_mata_kuliah ?? ''}}</span>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label>Waktu</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->waktu ?? ''}}</span>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label>Hari</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->hari ?? ''}}</span>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label>Ruangan Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->master_ruangan->nama_ruangan ?? ''}}</span>
    </div>
</div>

@endsection