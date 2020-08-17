<?php

namespace App\Http\Controllers;

use App\Models\master_status_pendidikan;
use App\Models\master_agama;
use App\Models\master_status_dosen;
use App\Models\master_status_kerja_dosen;

class FromDosenController extends CrudController
{
    protected $table_name = 'master_dosens';
    protected $menu_name = 'Dosen';
    protected $module_name = 'Master Karyawan';
    protected $class_name = 'master_dosen';
    protected $view_table = 'admin.tableMaster.tableDosen';
    protected $view_form = 'admin.formMaster.formDosen';
    protected $view_data = 'admin.viewMaster.viewDosen';

    function getSelection()
    {
       $pendidikan_selection = master_status_pendidikan::All();
       $agama_selection = master_agama::All();
       $status_selection = master_status_dosen::All();
       $status_kerja_selection = master_status_kerja_dosen::All();

        return [
        	'pendidikan_selection'		=> $pendidikan_selection,
			'agama_selection'			=> $agama_selection,
			'status_selection'			=> $status_selection,
			'status_kerja_selection'	=> $status_kerja_selection
        ];
    }
}
