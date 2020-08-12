<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_tahun_ajaran extends Model
{
    public function mahasiswa()
    {
		return $this->hasMany('App\Models\mahasiswa', 'kode_tahun_ajaran', 'id');
    }
}
