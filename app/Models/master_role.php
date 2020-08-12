<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_role extends Model
{
    public function master_module()
    {
    	return $this->belongsToMany('App\Models\master_module', 'master_role_rels', 'kode_master_role', 'kode_master_module');
    }

    public function user()
    {
    	return $this->hasMany('App\Models\user', 'kode_master_role', 'id');
    }
}
