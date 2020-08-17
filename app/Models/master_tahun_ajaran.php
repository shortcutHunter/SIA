<?php

namespace App\models;

class master_tahun_ajaran extends BaseModel
{
	protected static $logAttributes = ['id', 'tahun_ajaran'];
    protected $fillable = ['tahun_ajaran'];
    protected static $logName = 'Master Tahun Ajaran';
    protected static $fieldName = 'tahun_ajaran';

    public function mahasiswa()
    {
		return $this->hasMany('App\Models\mahasiswa', 'kode_tahun_ajaran', 'id');
    }

    public function master_mata_kuliah()
    {
		return $this->hasMany('App\Models\master_mata_kuliah', 'kode_tahun_ajaran', 'id');
    }


}
