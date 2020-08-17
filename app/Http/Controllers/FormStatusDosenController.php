<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormStatusDosenController extends CrudController
{
    protected $table_name = 'master_status_dosens';
    protected $menu_name = 'Status Dosen';
    protected $module_name = 'Master Status';
    protected $class_name = 'master_status_dosen';
    protected $view_table = 'admin.tableMaster.tableStatusDosen';
    protected $view_form = 'admin.formMaster.formStatusDosen';
    protected $view_data = 'admin.viewMaster.viewStatusDosen';
}
