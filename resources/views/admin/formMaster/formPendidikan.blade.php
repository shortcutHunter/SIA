@extends('admin.formMaster.formTemplate')

@section('form-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="nama_status">Pendidikan</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama_status" id="nama_status" class="form-control" placeholder="Pendidikan" value="{{$data->nama_status ?? ''}}" required>
            </div>
        </div>
    </div>
</div>

@endsection