<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_status_kerja_dosen extends Model
{
    public function master_dosen()
    {
        return $this->belongsTo('App\Models\master_dosen', 'kode_status_kerja_dosen', 'id');
    }
}
