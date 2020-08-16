<?php

namespace App\models;

class master_jurusan extends BaseModel
{
	protected static $logAttributes = ['id', 'nama_jurusan', 'alias'];
    protected $fillable = ['nama_jurusan', 'alias'];
    protected static $logName = 'Master Jurusan';
    protected static $fieldName = 'nama_jurusan';

    public function master_mata_kuliah()
    {
		return $this->hasMany('App\Models\master_mata_kuliah', 'kode_jurusan', 'id');
    }
    
    public function mahasiswa()
    {
		return $this->hasMany('App\Models\mahasiswa', 'kode_jurusan', 'id');
    }
}
