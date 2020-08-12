<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_jurusan extends Model
{
    public function master_mata_kuliah()
    {
		return $this->hasMany('App\Models\master_mata_kuliah', 'kode_jurusan', 'id');
    }
    
    public function mahasiswa()
    {
		return $this->hasMany('App\Models\mahasiswa', 'kode_jurusan', 'id');
    }
}
