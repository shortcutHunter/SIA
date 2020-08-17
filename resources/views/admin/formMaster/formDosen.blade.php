@extends('admin.formMaster.formTemplate')


@section('form-content')

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="nip">NIP</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nip" id="nip" value="{{$data->nip ?? ''}}" class="form-control" placeholder="NIP" required>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="nindn">NINDN</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nindn" id="nindn" value="{{$data->nindn ?? ''}}" class="form-control" placeholder="NINDN" required>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="nama_dosen">Nama Dosen</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="nama_dosen" id="nama_dosen" value="{{$data->nama_dosen ?? ''}}" class="form-control" placeholder="Nama Dosen" required>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="gelar">Gelar</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="gelar" id="gelar" value="{{$data->gelar ?? ''}}" class="form-control" placeholder="Gelar" required>
            </div>
        </div>
    </div>
</div>


<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_pendidikan_tertinggi">Pendidikan Tertinggi</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-inline">
                <select class="form-control show-tick" name="kode_pendidikan_tertinggi" id="kode_pendidikan_tertinggi">
                    <option value=""></option>
                    @foreach ($pendidikan_selection as $selection)
                        <option value="{{$selection->id}}" {{($data->master_status_pendidikan->id ?? '') == $selection->id ? 'selected' : ''}}>{{$selection->nama_status}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="tempat_lahir">Tempat Lahir</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{$data->tempat_lahir ?? ''}}" class="form-control" placeholder="Tempat Lahir" required>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="tanggal_lahir">Tanggal Lahir</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="input-group date" id="bs_datepicker_component_container_2">
                <div class="form-line">
                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{$data->tanggal_lahir ?? ''}}" class="form-control" placeholder="Tanggal Lahir">
                </div>
                <span class="input-group-addon">
                    <i class="material-icons">date_range</i>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="jenis_kelamin">Jenis Kelamin</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-inline">
                <select class="form-control show-tick" name="jenis_kelamin" id="jenis_kelamin">
                    <option value=""></option>
                    <option value="perempuan" selected="{{ ($data->jenis_kelamin ?? '') == 'perempuan' }}">Perempuan</option>
                    <option value="laki_laki" selected="{{ ($data->jenis_kelamin ?? '') == 'laki_laki' }}">Laki-Laki</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_agama">Agama</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-inline">
                <select class="form-control show-tick" name="kode_agama" id="kode_agama">
                    <option value=""></option>
                    @foreach ($agama_selection as $selection)
                        <option value="{{$selection->id}}" {{($data->master_agama->id ?? '') == $selection->id ? 'selected' : ''}}>{{$selection->nama_agama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="no_hp">No HP</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="no_hp" id="no_hp" value="{{$data->no_hp ?? ''}}" class="form-control" placeholder="No HP" required>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="email">Email</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="email" id="email" value="{{$data->email ?? ''}}" class="form-control" placeholder="Email" required>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="no_ktp">No.KTP</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="no_ktp" id="no_ktp" value="{{$data->no_ktp ?? ''}}" class="form-control" placeholder="No KTP" required>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="alamat_tempat_tinggal">Alamat Tempat Tinggal</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-line">
                <input type="text" name="alamat_tempat_tinggal" id="alamat_tempat_tinggal" value="{{$data->alamat_tempat_tinggal ?? ''}}" class="form-control" placeholder="Alamat Tempat Tinggal" required>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="mulai_bekerja">Mulai Bekerja</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="input-group date" id="bs_datepicker_component_container">
                <div class="form-line">
                    <input type="text" name="mulai_bekerja" id="mulai_bekerja" value="{{$data->mulai_bekerja ?? ''}}" class="form-control" placeholder="Tanggal Lahir">
                </div>
                <span class="input-group-addon">
                    <i class="material-icons">date_range</i>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_status_dosen">Status Dosen</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-inline">
                <select class="form-control show-tick" name="kode_status_dosen" id="kode_status_dosen">
                    <option value=""></option>
                    @foreach ($status_selection as $selection)
                        <option value="{{$selection->id}}" {{($data->master_status_dosen->id ?? '') == $selection->id ? 'selected' : ''}}>{{$selection->nama_status}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
        <label for="kode_status_kerja_dosen">Status Kerja Dosen</label>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
        <div class="form-group">
            <div class="form-inline">
                <select class="form-control show-tick" name="kode_status_kerja_dosen" id="kode_status_kerja_dosen">
                    <option value=""></option>
                    @foreach ($status_kerja_selection as $selection)
                        <option value="{{$selection->id}}" {{($data->master_status_kerja_dosen->id ?? '') == $selection->id ? 'selected' : ''}}>{{$selection->nama_status_kerja}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

@endsection