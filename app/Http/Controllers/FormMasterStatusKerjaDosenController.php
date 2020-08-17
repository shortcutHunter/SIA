<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormMasterStatusKerjaDosenController extends CrudController
{
    protected $table_name = 'master_status_kerja_dosens';
    protected $menu_name = 'Status Kerja Dosen';
    protected $module_name = 'Master Status';
    protected $class_name = 'master_status_kerja_dosen';
    protected $view_table = 'admin.tableMaster.tableStatusKerjaDosen';
    protected $view_form = 'admin.formMaster.formStatusKerjaDosen';
    protected $view_data = 'admin.viewMaster.viewStatusKerjaDosen';
}
