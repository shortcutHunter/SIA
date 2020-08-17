@extends('admin.formMaster.formTemplate')


@section('form-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_mata_kuliah">Mata Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-inline">
                <select class="form-control show-tick" name="kode_mata_kuliah" id="kode_mata_kuliah">
                    <option value=""></option>
                    @foreach ($mata_kuliah_selection as $selection)
                        <option value="{{$selection->kode_mata_kuliah}}" {{($data->master_mata_kuliah->kode_mata_kuliah ?? '') == $selection->kode_mata_kuliah ? 'selected' : ''}}>{{$selection->nama_mata_kuliah}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="demo-masked-input">
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="waktu">Waktu</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" name="waktu" id="waktu" value="{{$data->waktu ?? ''}}" class="form-control time24" placeholder="Contoh: 23:59">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="hari">Hari</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="hari" id="hari" value="{{$data->hari ?? ''}}" class="form-control" placeholder="Contoh: Senin" required>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_ruangan">Ruangan Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-inline">
                <select class="form-control show-tick" name="kode_ruangan" id="kode_ruangan">
                    <option value=""></option>
                    @foreach ($ruangan_selection as $selection)
                        <option value="{{$selection->kode_ruangan}}" {{($data->master_ruangan->kode_ruangan ?? '') == $selection->kode_ruangan ? 'selected' : ''}}>{{$selection->nama_ruangan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

@endsection