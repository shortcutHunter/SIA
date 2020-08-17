@extends('admin.viewMaster.viewTemplate')

@section('view-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
        <label for="Pendidikan">Pendidikan</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <span>{{$data->nama_status ?? ''}}</span>
    </div>
</div>

@endsection