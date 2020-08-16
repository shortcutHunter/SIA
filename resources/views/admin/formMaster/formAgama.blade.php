@extends('admin.formMaster.formTemplate')

@section('form-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="nama_agama">Agama</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama_agama" id="nama_agama" class="form-control" placeholder="Agama" value="{{$data->nama_agama ?? ''}}" required>
            </div>
        </div>
    </div>
</div>

@endsection