<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class master_agama extends Model
{
    use LogsActivity;
    use CausesActivity;

    protected static $ignoreChangedAttributes = ['created_at', 'updated_at'];
    
    protected static $logAttributes = ['id', 'nama_agama'];


    protected static $logName = 'Master Agama';

    static function getLogName()
    {
        return "Master Agama";
    }

    static function getFieldName()
    {
        return 'nama_agama';
    }
}
