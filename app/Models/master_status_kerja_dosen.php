<?php

namespace App\models;

class master_status_kerja_dosen extends BaseModel
{
	protected static $logAttributes = ['id', 'nama_status_kerja'];
    protected $fillable = ['nama_status_kerja'];
    protected static $logName = 'Master Status Kerja Dosen';
    protected static $fieldName = 'nama_status_kerja';

    public function master_dosen()
    {
        return $this->belongsTo('App\Models\master_dosen', 'kode_status_kerja_dosen', 'id');
    }
}
