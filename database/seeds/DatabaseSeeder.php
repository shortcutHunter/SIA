<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
    }
}
