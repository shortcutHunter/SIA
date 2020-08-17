<?php

namespace App\models;

use \Carbon\Carbon;

class master_dosen extends BaseModel
{
    protected static $logFillable  = true;
    protected $fillable = ['*'];
    protected static $logName = 'Master Dosen';
    protected static $fieldName = 'nama_dosen';

    public function master_agama()
    {
        return $this->belongsTo('App\Models\master_agama', 'kode_agama', 'id');
    }

    public function master_status_dosen()
    {
        return $this->belongsTo('App\Models\master_status_dosen', 'kode_status_dosen', 'id');
    }

    public function master_status_pendidikan()
    {
        return $this->belongsTo('App\Models\master_status_pendidikan', 'kode_pendidikan_tertinggi', 'id');
    }

    public function master_status_kerja_dosen()
    {
        return $this->belongsTo('App\Models\master_status_kerja_dosen', 'kode_status_kerja_dosen', 'id');
    }
    
    public function master_mata_kuliah()
    {
        return $this->hasMany('App\Models\master_mata_kuliah', 'penanggung_jawab_nindn', 'id');
    }

    public function setTanggalLahirAttribute( $value ) {
      $this->attributes['tanggal_lahir'] = (new Carbon($value))->format('d/m/y');
    }

    public function setMulaiBekerjaAttribute( $value ) {
      $this->attributes['mulai_bekerja'] = (new Carbon($value))->format('d/m/y');
    }

    public function getTanggalLahirAttribute($value)
    {
        return (new Carbon($value))->format('d F Y');
    }
    public function getMulaiBekerjaAttribute($value)
    {
        return (new Carbon($value))->format('d F Y');
    }
}
