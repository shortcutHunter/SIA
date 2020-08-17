@extends('admin.viewMaster.viewTemplate')

@section('view-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label>Kode Mata Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->kode_mata_kuliah ?? ''}}</span>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label>Nama Mata Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->nama_mata_kuliah ?? ''}}</span>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label>Jurusan</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->master_jurusan->nama_jurusan ?? ''}}</span>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label>Tahun Ajaran</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->master_tahun_ajaran->tahun_ajaran ?? ''}}</span>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label>Semester</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->semester_mata_kuliah ?? ''}}</span>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label>Jenis Mata Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->master_jenis_mata_kuliah->keterangan ?? ''}}</span>
    </div>
</div>

@endsection