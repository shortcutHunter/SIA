<?php

namespace App\Helper;

use App\ErrorLog;
use App\Models\master_module;
use App\Models\master_menu;

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

    public static function defaultConstruct($nama_menu, $module_name)
    {
        $master_module = master_module::where('nama_module', $module_name)->first();
        $master_module = $master_module ? $master_module->id : false;

        // Set menu to active
        $master_menu = master_menu::where('nama_menu', $nama_menu)->first();
        config(['active_nav' => $master_menu->nama_menu]);
        config(['active_category' => $master_menu->category]);

        return [$master_module, $master_menu];
    }
}