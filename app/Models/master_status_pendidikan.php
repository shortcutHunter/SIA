<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_status_pendidikan extends Model
{
    public function master_dosen()
    {
        return $this->belongsTo('App\Models\master_dosen', 'kode_pendidikan_tertinggi', 'id');
    }
}
