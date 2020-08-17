<?php

namespace App\Http\Controllers;

use App\Models\master_mata_kuliah;
use App\Models\master_ruangan;

class FromJadwalKuliahController extends CrudController
{
    protected $table_name = 'jadwal_kuliahs';
    protected $menu_name = 'Jadwal Mata Kuliah';
    protected $module_name = 'Master Perkuliahan';
    protected $class_name = 'jadwal_kuliah';
    protected $view_table = 'admin.tableMaster.tableJadwalkuliah';
    protected $view_form = 'admin.formMaster.formJadwalkuliah';
    protected $view_data = 'admin.viewMaster.viewJadwalkuliah';

    function getSelection()
    {
       $mata_kuliah_selection = master_mata_kuliah::All();
       $ruangan_selection = master_ruangan::All();

        return [
            'mata_kuliah_selection' => $mata_kuliah_selection,
            'ruangan_selection'     => $ruangan_selection,
        ];
    }
}
