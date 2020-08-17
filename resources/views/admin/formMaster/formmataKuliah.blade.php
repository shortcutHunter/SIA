@extends('admin.formMaster.formTemplate')

@section('form-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_mata_kuliah">Kode Mata Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="kode_mata_kuliah" id="kode_mata_kuliah" value="{{$data->kode_mata_kuliah ?? ''}}" class="form-control" placeholder="Kode Mata Kuliah" required>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="nama_mata_kuliah">Nama Mata Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama_mata_kuliah" id="nama_mata_kuliah" value="{{$data->nama_mata_kuliah ?? ''}}" class="form-control" placeholder="Nama Mata Kuliah" required>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_status_mata_kuliah">Jenis Mata Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <select class="form-control show-tick" name="kode_status_mata_kuliah" id="kode_status_mata_kuliah">
                    <option value=""></option>
                    @foreach ($status_selection as $selection)
                        <option value="{{$selection->id}}" {{($data->master_jenis_mata_kuliah->id ?? '') == $selection->id ? 'selected' : ''}}>{{$selection->keterangan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="penanggung_jawab_nindn">Penanggung Jawab Mata Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <select class="form-control show-tick" name="penanggung_jawab_nindn" id="penanggung_jawab_nindn">
                    <option value=""></option>
                    @foreach ($dosen_selection as $selection)
                        <option value="{{$selection->nindn}}" {{($data->master_dosen->id ?? '') == $selection->id ? 'selected' : ''}}>{{$selection->nama_dosen}}</option>
                    @endforeach
                </select>                
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_jurusan">Jurusan</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <select class="form-control show-tick" name="kode_jurusan" id="kode_jurusan">
                    <option value=""></option>
                    @foreach ($jurusan_selection as $selection)
                        <option value="{{$selection->id}}" {{($data->master_jurusan->id ?? '') == $selection->id ? 'selected' : ''}}>{{$selection->nama_jurusan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_tahun_ajaran">Tahun Ajaran</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <select class="form-control show-tick" name="kode_tahun_ajaran" id="kode_tahun_ajaran">
                    <option value=""></option>
                    @foreach ($tahun_ajaran_selection as $selection)
                        <option value="{{$selection->id}}" {{($data->master_tahun_ajaran->id ?? '') == $selection->id ? 'selected' : ''}}>{{$selection->tahun_ajaran}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="semester_mata_kuliah">Semester Mata Kuliah</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="semester_mata_kuliah" id="semester_mata_kuliah" value="{{$data->semester_mata_kuliah ?? ''}}" class="form-control" placeholder="Nama Mata Kuliah" required>
            </div>
        </div>
    </div>
</div>

@endsection