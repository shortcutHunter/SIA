<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class kartu_studi extends Model
{
    public function mahasiswa()
    {
		return $this->belongsTo('App\Models\mahasiswa', 'nim', 'nim_mahasiswa');
    }

    public function master_mata_kuliah()
    {
		return $this->belongsToMany('App\Models\master_mata_kuliah');
    }

    public function transaksi_nilai()
    {
		return $this->hasMany('App\Models\transaksi_nilai', 'kode_kartu_studi', 'id');
    }
}
