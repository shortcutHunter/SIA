<?php

namespace App\models;

class jadwal_kuliah extends BaseModel
{
	protected static $logAttributes = ['id', 'kode_mata_kuliah', 'waktu', 'hari', 'kode_ruangan'];
    protected $fillable = ['kode_mata_kuliah', 'waktu', 'hari', 'kode_ruangan'];
    protected static $logName = 'Jadwal Kuliah';
    protected static $fieldName = 'hari';

    public function master_ruangan()
    {
		return $this->belongsTo('App\Models\master_ruangan', 'kode_ruangan', 'kode_ruangan');
    }
    
    public function master_mata_kuliah()
    {
		return $this->belongsTo('App\Models\master_mata_kuliah', 'kode_mata_kuliah', 'kode_mata_kuliah');
    }
}
