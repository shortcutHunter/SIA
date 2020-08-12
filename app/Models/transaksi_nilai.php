<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class transaksi_nilai extends Model
{
    public function kartu_studi()
    {
		return $this->belongsTo('App\Models\kartu_studi', 'kode_kartu_studi', 'id');
    }
}
