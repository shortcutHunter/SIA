<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class MasterImport implements ToCollection
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            DB::table($this->table)->insert([
                'nama_agama' => $row[0],
            ]);
        }
    }
}
