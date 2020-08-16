<?php

namespace App\Http\Controllers;

class FromTahunAjaranController extends CrudController
{
    protected $table_name = 'master_tahun_ajarans';
    protected $menu_name = 'Tahun Ajaran';
    protected $module_name = 'Master Perkuliahan';
    protected $class_name = 'master_tahun_ajaran';
    protected $view_table = 'admin.tableMaster.tableTahunAjaran';
    protected $view_form = 'admin.formMaster.formtahunAjaran';
    protected $view_data = 'admin.viewMaster.viewTahunAjaran';
}
