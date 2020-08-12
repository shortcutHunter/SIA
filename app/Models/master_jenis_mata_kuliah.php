<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_jenis_mata_kuliah extends Model
{
    public function master_mata_kuliah()
    {
		return $this->hasMany('App\Models\master_mata_kuliah', 'kode_status_mata_kuliah', 'id');
    }
}
