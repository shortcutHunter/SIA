<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class jadwal_kuliah extends Model
{
    public function master_ruangan()
    {
		return $this->belongsTo('App\Models\master_ruangan', 'kode_ruangan', 'id');
    }
    
    public function master_mata_kuliah()
    {
		return $this->belongsTo('App\Models\master_mata_kuliah', 'kode_mata_kuliah', 'id');
    }
}
