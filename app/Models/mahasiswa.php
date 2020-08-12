<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    public function kartu_studi()
    {
		return $this->hasMany('App\Models\kartu_studi', 'id', 'nim_mahasiswa');
    }

    public function user()
    {
		return $this->belongsTo('App\Models\user', 'nim', 'kode_mahasiswa');
    }

    public function master_jurusan()
    {
		return $this->belongsTo('App\Models\master_jurusan', 'kode_jurusan', 'id');
    }

    public function master_agama()
    {
		return $this->belongsTo('App\Models\master_agama', 'kode_agama', 'id');
    }

    public function master_tahun_ajaran()
    {
		return $this->belongsTo('App\Models\master_tahun_ajaran', 'kode_tahun_ajaran', 'id');
    }
}
