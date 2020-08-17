@extends('admin.formMaster.formTemplate')

@section('form-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_ruangan">Kode Ruangan</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="kode_ruangan" id="kode_ruangan" value="{{$data->kode_ruangan ?? ''}}" class="form-control" placeholder="Contoh: Ruangan TIF-01" required>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="nama_ruangan">Nama Ruangan</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama_ruangan" id="nama_ruangan" value="{{$data->nama_ruangan ?? ''}}" class="form-control" placeholder="Contoh: Ruangan B201" required>
            </div>
        </div>
    </div>
</div>

@endsection