<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_menu extends Model
{
    public function master_module()
    {
    	return $this->belongsToMany('App\Models\master_module', 'master_module_rels', 'mode_master_menu', 'kode_master_module');
    }
}
