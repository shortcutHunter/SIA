<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class MasterExport implements FromCollection
{
    protected $table;
    protected $ids;

    public function __construct($table, $ids=false)
    {
        $this->table = $table;
        $this->ids = $ids;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $table = DB::table($this->table);
        if($this->ids){
            $table = $table->whereIn('id', $this->ids);
        }
        return $table->get();
    }
}
