<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $className = 'App\\Models\\' . substr($this->table, 0, -1);
        $model = new $className;
        $fillable = $model->getFillable();
        $user = Auth::id();
        $values = [];

        foreach ($rows as $row) 
        {
            $value = [];
            $new_record = new $className;
            foreach($fillable as $key => $field){
                $value[$field] = $row[$key];
                $new_record[$field] = $row[$key];
            }
            $new_record->disableLogging()->save();
            $new_record->enableLogging();
            array_push($values, $value);
        }
        activity($model->getLogName())
                ->performedOn($model)
                ->causedBy($user)
                ->withProperties($values)
                ->log('Import');
    }
}
