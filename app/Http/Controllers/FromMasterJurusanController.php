<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FromMasterJurusanController extends CrudController
{
    protected $table_name = 'master_jurusans';
    protected $menu_name = 'Jurusan';
    protected $module_name = 'Master Perkuliahan';
    protected $class_name = 'master_jurusan';
    protected $view_table = 'admin.tableMaster.tableJurusan';
    protected $view_form = 'admin.formMaster.formJurusan';
    protected $view_data = 'admin.viewMaster.viewJurusan';

}
