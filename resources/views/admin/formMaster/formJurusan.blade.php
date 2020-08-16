@extends('admin.formMaster.formTemplate')

@section('form-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="nama_jurusan">Nama Jurusan</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama_jurusan" id="nama_jurusan" value="{{$data->nama_jurusan ?? ''}}" class="form-control" placeholder="contoh:Teknik Perangkat Lunak" required>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="alias">Alias</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="alias" id="alias" value="{{$data->alias ?? ''}}" class="form-control" placeholder="contoh:TPL" required>
            </div>
        </div>
    </div>
</div>

@endsection