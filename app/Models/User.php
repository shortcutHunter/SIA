<?php

namespace App\models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\master_role_rel;

class User extends Authenticatable
{
    public function mahasiswa()
    {
        return $this->hasOne('App\Models\mahasiswa', 'nim', 'kode_mahasiswa');
    }

    public function master_dosen()
    {
        return $this->hasOne('App\Models\master_dosen', 'id', 'kode_dosen');
    }

    public function master_role()
    {
        return $this->belongsTo('App\Models\master_role', 'kode_master_role', 'id');
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
