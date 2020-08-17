<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FromPendidikanController extends CrudController
{
    protected $table_name = 'master_status_pendidikans';
    protected $menu_name = 'Pendidikan';
    protected $module_name = 'Master Data Diri';
    protected $class_name = 'master_status_pendidikan';
    protected $view_table = 'admin.tableMaster.tablePendidikan';
    protected $view_form = 'admin.formMaster.formPendidikan';
    protected $view_data = 'admin.viewMaster.viewPendidikan';
}
