<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_mata_kuliah extends Model
{
    public function jadwal_kuliah()
    {
		return $this->hasOne('App\Models\jadwal_kuliah', 'kode_mata_kuliah', 'id');
    }

    public function master_jenis_mata_kuliah()
    {
		return $this->belongsTo('App\Models\master_jenis_mata_kuliah', 'kode_status_mata_kuliah', 'id');
    }

    public function master_jurusan()
    {
		return $this->belongsTo('App\Models\master_jurusan', 'kode_jurusan', 'id');
    }

    public function kartu_studi()
    {
        return $this->belongsToMany('App\Models\kartu_studi', 'mata_kuliah_rels', 'kode_mata_kuliah', 'kode_kartu_studi');
    }

    public function master_dosen()
    {
        return $this->belongsTo('App\Models\master_dosen', 'penanggung_jawab_nindn', 'id');
    }
}
