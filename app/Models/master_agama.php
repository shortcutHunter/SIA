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

    protected $fillable = ['nama_agama'];

    public static function getLogName()
    {
        return self::$logName;
    }

    static function getFieldName()
    {
        return 'nama_agama';
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
    }
}
