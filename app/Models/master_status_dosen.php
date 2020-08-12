<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_status_dosen extends Model
{
    public function master_dosen()
    {
        return $this->hasMany('App\Models\master_dosen', 'kode_status_dosen', 'id');
    }
}
