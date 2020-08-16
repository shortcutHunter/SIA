<?php

namespace App\Http\Controllers;

class FromAgamaController extends CrudController
{

    protected $table_name = 'master_agamas';
    protected $menu_name = 'Agama';
    protected $module_name = 'Master Data Diri';
    protected $class_name = 'master_agama';
    protected $view_table = 'admin.tableMaster.tableAgama';
    protected $view_form = 'admin.formMaster.formAgama';
    protected $view_data = 'admin.viewMaster.viewAgama';

}
