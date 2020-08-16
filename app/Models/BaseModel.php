<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use \Carbon\Carbon;

class BaseModel extends Model
{
    use LogsActivity;
    use CausesActivity;

    protected static $ignoreChangedAttributes = ['created_at', 'updated_at'];
    protected static $logName;
    protected static $fieldName;
    
    public static function getLogName()
    {
        return static::$logName;
    }

    static function getFieldName()
    {
        return static::$fieldName;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromTimeStamp(strtotime($value))->diffForHumans();
    }
}
