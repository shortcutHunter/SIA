@extends('admin.viewMaster.viewTemplate')

@section('view-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label for="Tahun Ajaran">Tahun Ajaran</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->tahun_ajaran ?? ''}}</span>
    </div>
</div>

@endsection