<?php

use Illuminate\Database\Seeder;

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
        	['nama_agama' => 'Islam'],
        	['nama_agama' => 'Kristen Protestan'],
        	['nama_agama' => 'Katolik'],
        	['nama_agama' => 'Hindu'],
        	['nama_agama' => 'Kong Hu Cu'],
        ]);

        DB::table('master_status_dosens')->insert([
        	['nama_status' => 'active'],
        	['nama_status' => 'non_active'],
        	['nama_status' => 'cuti'],
        ]);

        DB::table('master_status_kerja_dosens')->insert([
        	['nama_status_kerja' => 'Honorer'],
        	['nama_status_kerja' => 'Permanen'],
        	['nama_status_kerja' => 'Kontrak'],
        ]);

        DB::table('master_status_pendidikans')->insert([
        	['nama_status' => 'Sarjana'],
        	['nama_status' => 'Magister'],
        	['nama_status' => 'Doktor'],
        ]);

        DB::table('master_jenis_mata_kuliahs')->insert([
        	['keterangan' => 'Umum'],
        	['keterangan' => 'Wajib'],
        	['keterangan' => 'Pilihan'],
        ]);
    }
}
