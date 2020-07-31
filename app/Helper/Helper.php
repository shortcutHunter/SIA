<?php

namespace App\Helper;

use App\ErrorLog;

class Helper
{
    public static function ErrorHandler($message, $error)
    {
        $error_log = new ErrorLog;
        $error_log->keterangan = $error;
        $error_log->info = 'Causer: '.auth()->user()->nama_user;
        $error_log->save();
        alert()->error($message);
    }

    public static function ErrorHandlerAPI($message, $error)
    {
        $error_log = new ErrorLog;
        $error_log->keterangan = $error;
        $error_log->info = 'Causer: '.auth()->user()->nama_user;
        $error_log->save();
        abort(500, "Error Processing");
    }
}