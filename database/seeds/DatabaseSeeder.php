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

        $master_menu_agama_id = DB::table('master_menus')->insertGetId([
            'nama_menu' => 'Agama', 
            'link' => '/admin/inputagama', 
            'category' => 'Master Form Data Diri', 
            'created_at' => Carbon::now()
        ]);
        
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

        $module_log_id = DB::table('master_modules')->insertGetId([
            'nama_module' => 'Log', 
            'created_at' => Carbon::now(),
        ]);

        $module_role_id = DB::table('master_modules')->insertGetId([
            'nama_module' => 'Master Agama', 
            'created_at' => Carbon::now(),
        ]);

        DB::table('master_role_rels')->insert([
            [
                'kode_master_role' => $role_admin_id, 
                'kode_master_module' => $module_role_id, 
                'created_at' => Carbon::now()
            ],
            [
                'kode_master_role' => $role_admin_id, 
                'kode_master_module' => $module_log_id, 
                'created_at' => Carbon::now()
            ],
        ]);

        DB::table('master_module_rels')->insert([
            [
                'kode_master_menu' => $master_menu_agama_id, 
                'kode_master_module' => $module_role_id, 
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
