<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class master_module extends Model
{
    public function master_menu()
    {
    	return $this->belongsToMany('App\Models\master_menu');
    }

    public function master_role()
    {
    	return $this->belongsToMany('App\Models\master_role');
    }
}
