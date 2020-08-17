<?php

namespace App\Http\Controllers;

class FromMasterRuangKuliahController extends CrudController
{
    protected $table_name = 'master_ruangans';
    protected $menu_name = 'Ruangan Kuliah';
    protected $module_name = 'Master Status';
    protected $class_name = 'master_ruangan';
    protected $view_table = 'admin.tableMaster.tableRuangan';
    protected $view_form = 'admin.formMaster.formRuangan';
    protected $view_data = 'admin.viewMaster.viewRuangan';
}
