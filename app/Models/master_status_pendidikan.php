<?php

namespace App\models;

class master_status_pendidikan extends BaseModel
{
	protected static $logAttributes = ['id', 'nama_status'];
    protected $fillable = ['nama_status'];
    protected static $logName = 'Master Status Pendidikan Dosen';
    protected static $fieldName = 'nama_status';

    public function master_dosen()
    {
        return $this->belongsTo('App\Models\master_dosen', 'kode_pendidikan_tertinggi', 'id');
    }
}
