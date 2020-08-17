<?php

namespace App\Http\Controllers;

use App\Models\master_jenis_mata_kuliah;
use App\Models\master_dosen;
use App\Models\master_tahun_ajaran;
use App\Models\master_jurusan;

class FromMataKuliahController extends CrudController
{
    protected $table_name = 'master_mata_kuliahs';
    protected $menu_name = 'Mata Kuliah';
    protected $module_name = 'Master Perkuliahan';
    protected $class_name = 'master_mata_kuliah';
    protected $view_table = 'admin.tableMaster.tableMataKuliah';
    protected $view_form = 'admin.formMaster.formmataKuliah';
    protected $view_data = 'admin.viewMaster.viewMataKuliah';

    function getSelection()
    {
        $status_selection = master_jenis_mata_kuliah::All();
        $dosen_selection = master_dosen::All();
        $jurusan_selection = master_jurusan::All();
        $tahun_ajaran_selection = master_tahun_ajaran::All();

        return [
            'status_selection'       => $status_selection,
            'dosen_selection'        => $dosen_selection,
            'jurusan_selection'      => $jurusan_selection,
            'tahun_ajaran_selection' => $tahun_ajaran_selection,
        ];
    }
}
