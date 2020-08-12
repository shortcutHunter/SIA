<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_ruangan extends Model
{
    public function jadwal_kuliah()
    {
		return $this->hasMany('App\Models\jadwal_kuliah', 'kode_ruangan', 'id');
    }
}
