<?php

namespace App\models;

class master_status_dosen extends BaseModel
{
	protected static $logAttributes = ['id', 'nama_status'];
    protected $fillable = ['nama_status'];
    protected static $logName = 'Master Status Dosen';
    protected static $fieldName = 'nama_status';

    public function master_dosen()
    {
        return $this->hasMany('App\Models\master_dosen', 'kode_status_dosen', 'id');
    }
}
