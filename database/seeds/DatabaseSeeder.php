<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_agamas')->insert([
        	['nama_agama' => 'Islam', 'created_at' => Carbon::now()],
        	['nama_agama' => 'Kristen Protestan', 'created_at' => Carbon::now()],
        	['nama_agama' => 'Katolik', 'created_at' => Carbon::now()],
        	['nama_agama' => 'Hindu', 'created_at' => Carbon::now()],
        	['nama_agama' => 'Kong Hu Cu', 'created_at' => Carbon::now()],
        ]);

        DB::table('master_status_dosens')->insert([
        	['nama_status' => 'active', 'created_at' => Carbon::now()],
        	['nama_status' => 'non_active', 'created_at' => Carbon::now()],
        	['nama_status' => 'cuti', 'created_at' => Carbon::now()],
        ]);

        DB::table('master_status_kerja_dosens')->insert([
        	['nama_status_kerja' => 'Honorer', 'created_at' => Carbon::now()],
        	['nama_status_kerja' => 'Permanen', 'created_at' => Carbon::now()],
        	['nama_status_kerja' => 'Kontrak', 'created_at' => Carbon::now()],
        ]);

        DB::table('master_status_pendidikans')->insert([
        	['nama_status' => 'Sarjana', 'created_at' => Carbon::now()],
        	['nama_status' => 'Magister', 'created_at' => Carbon::now()],
        	['nama_status' => 'Doktor', 'created_at' => Carbon::now()],
        ]);

        DB::table('master_jenis_mata_kuliahs')->insert([
        	['keterangan' => 'Umum', 'created_at' => Carbon::now()],
        	['keterangan' => 'Wajib', 'created_at' => Carbon::now()],
        	['keterangan' => 'Pilihan', 'created_at' => Carbon::now()],
        ]);


####################
# MASTER DATA MENU #
####################

        // Home
        $master_menu_home_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Home', 
            'link' => '/admin', 
            'category' => '', 
            'icon' => 'home', 
            'created_at' => Carbon::now()
        ]);

        // Master Perkuliahan
        $master_menu_tahun_ajaran_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Tahun Ajaran', 
            'link' => '/admin/inputtahunajaran', 
            'category' => 'Master Perkuliahan', 
            'icon' => 'widgets', 
            'created_at' => Carbon::now()
        ]);
        $master_menu_jurusan_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Jurusan', 
            'link' => '/admin/jurusan', 
            'category' => 'Master Perkuliahan', 
            'icon' => 'widgets', 
            'created_at' => Carbon::now()
        ]);
        $master_menu_mata_kuliah_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Mata Kuliah', 
            'link' => '/admin/inputmatakuliah', 
            'category' => 'Master Perkuliahan', 
            'icon' => 'widgets', 
            'created_at' => Carbon::now()
        ]);
        $master_menu_jadwal_mata_kuliah_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Jadwal Mata Kuliah', 
            'link' => '/admin/jadwal-kuliah', 
            'category' => 'Master Perkuliahan', 
            'icon' => 'widgets', 
            'created_at' => Carbon::now()
        ]);

        // Master Data Diri
        $master_menu_agama_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Agama', 
            'link' => '/admin/inputagama', 
            'category' => 'Master Data Diri', 
            'icon' => 'accessibility', 
            'created_at' => Carbon::now()
        ]);

        // Master Karyawan
        $master_menu_dosen_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Dosen', 
            'link' => '/admin/dosen', 
            'category' => 'Master Karyawan', 
            'icon' => 'perm_identity', 
            'created_at' => Carbon::now()
        ]);

        // Master Status
        $master_menu_role_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Role', 
            'link' => '/admin/master-role', 
            'category' => 'Master Status', 
            'icon' => 'code', 
            'created_at' => Carbon::now()
        ]);
        $master_menu_ruang_kuliah_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Ruangan Kuliah', 
            'link' => '/admin/ruang-kuliah', 
            'category' => 'Master Status', 
            'icon' => 'code', 
            'created_at' => Carbon::now()
        ]);
        $master_menu_jenis_mata_kuliah_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Jenis Mata Kuliah', 
            'link' => '/admin/jenis-perkuliahan', 
            'category' => 'Master Status', 
            'icon' => 'code', 
            'created_at' => Carbon::now()
        ]);
        
####################
# MASTER DATA MENU #
####################
        

        $role_admin_id = DB::table('master_roles')->insertGetId([
            'nama_role' => 'Admin', 
            'created_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nama_user' => 'admin', 
            'email' => 'admin@admin.com', 
            'password' => Hash::make('admin'),
            'kode_master_role' => $role_admin_id,
            'created_at' => Carbon::now()
        ]);

#################
# MASTER MODULE #
#################

        $module_log_id = DB::table('master_modules')->insertGetId([
            'nama_module' => 'Log', 
            'created_at' => Carbon::now(),
        ]);
        $module_data_diri_id = DB::table('master_modules')->insertGetId([
            'nama_module' => 'Master Data Diri', 
            'created_at' => Carbon::now(),
        ]);
        $module_master_perkuliahan_id = DB::table('master_modules')->insertGetId([
            'nama_module' => 'Master Perkuliahan', 
            'created_at' => Carbon::now(),
        ]);
        $module_master_karyawan_id = DB::table('master_modules')->insertGetId([
            'nama_module' => 'Master Karyawan', 
            'created_at' => Carbon::now(),
        ]);
        $module_master_status_id = DB::table('master_modules')->insertGetId([
            'nama_module' => 'Master Status', 
            'created_at' => Carbon::now(),
        ]);

#################
# MASTER MODULE #
#################

        DB::table('master_role_rels')->insert([
            [
                'kode_master_role' => $role_admin_id, 
                'kode_master_module' => $module_data_diri_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_role' => $role_admin_id, 
                'kode_master_module' => $module_log_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_role' => $role_admin_id, 
                'kode_master_module' => $module_master_perkuliahan_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_role' => $role_admin_id, 
                'kode_master_module' => $module_master_karyawan_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_role' => $role_admin_id, 
                'kode_master_module' => $module_master_status_id, 
                'created_at' => Carbon::now()
            ],
        ]);

        DB::table('master_module_rels')->insert([
            [
                'kode_master_menu' => $master_menu_tahun_ajaran_id, 
                'kode_master_module' => $module_master_perkuliahan_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_menu' => $master_menu_jurusan_id, 
                'kode_master_module' => $module_master_perkuliahan_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_menu' => $master_menu_mata_kuliah_id, 
                'kode_master_module' => $module_master_perkuliahan_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_menu' => $master_menu_jadwal_mata_kuliah_id, 
                'kode_master_module' => $module_master_perkuliahan_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_menu' => $master_menu_agama_id, 
                'kode_master_module' => $module_data_diri_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_menu' => $master_menu_dosen_id, 
                'kode_master_module' => $module_master_karyawan_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_menu' => $master_menu_role_id, 
                'kode_master_module' => $module_master_status_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_menu' => $master_menu_ruang_kuliah_id, 
                'kode_master_module' => $module_master_status_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_menu' => $master_menu_jenis_mata_kuliah_id, 
                'kode_master_module' => $module_master_status_id, 
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
