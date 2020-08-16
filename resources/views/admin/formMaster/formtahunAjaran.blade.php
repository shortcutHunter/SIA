@extends('admin.formMaster.formTemplate')

@section('form-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="tahun_ajaran">Tahun Ajaran</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" placeholder="Tahun Ajaran contoh: 2019/2020" value="{{$data->tahun_ajaran ?? ''}}" required>
            </div>
        </div>
    </div>
</div>

@endsection