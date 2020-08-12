<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_dosen extends Model
{
    public function master_agama()
    {
        return $this->belongsTo('App\Models\master_agama', 'kode_agama', 'id');
    }

    public function master_status_dosen()
    {
        return $this->belongsTo('App\Models\master_status_dosen', 'kode_status_dosen', 'id');
    }

    public function master_status_dosen()
    {
        return $this->belongsTo('App\Models\master_status_dosen', 'kode_pendidikan_tertinggi', 'id');
    }

    public function master_status_kerja_dosen()
    {
        return $this->belongsTo('App\Models\master_status_kerja_dosen', 'kode_status_kerja_dosen', 'id');
    }
    
    public function master_mata_kuliah()
    {
        return $this->hasMany('App\Models\master_mata_kuliah', 'penanggung_jawab_nindn', 'id');
    }
}
