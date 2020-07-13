<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class master_agama extends Model
{
    use LogsActivity;
    use CausesActivity;

    protected $fillable = ['*'];

    protected static $logAttributes = ['*'];

    protected static $logName = 'Master Agama';
}
