<?php

namespace App\models;

class master_ruangan extends BaseModel
{
	protected static $logAttributes = ['id', 'kode_ruangan', 'nama_ruangan'];
    protected $fillable = ['kode_ruangan', 'nama_ruangan'];
    protected static $logName = 'Master Ruangan';
    protected static $fieldName = 'nama_ruangan';

    public function jadwal_kuliah()
    {
		return $this->hasMany('App\Models\jadwal_kuliah', 'kode_ruangan', 'kode_ruangan');
    }
}
