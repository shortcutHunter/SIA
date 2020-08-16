<?php

namespace App\models;

class master_agama extends BaseModel
{
    protected static $logAttributes = ['id', 'nama_agama'];
    protected $fillable = ['nama_agama'];
    protected static $logName = 'Master Agama';
    protected static $fieldName = 'nama_agama';

    public function mahasiswa()
    {
        return $this->hasMany('App\Models\mahasiswa', 'kode_agama', 'id');
    }
    
    public function master_dosen()
    {
        return $this->hasMany('App\Models\master_dosen', 'kode_agama', 'id');
    }
}
