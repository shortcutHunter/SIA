<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Exports\MasterExport;
use App\Imports\MasterImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Helper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function delete(Request $request)
    {
        try {
            $user = Auth::id();
            $ids = [];
            $table = $request->table;
            $model = false;
            $className = 'App\\Models\\' . substr($table, 0, -1);
            $model = new $className;

            foreach($request->all() as $key => $value){
                if(preg_match('/record_id/i', $key)){
                    array_push($ids, $value);
                }
            }
            
            $records = $model->whereIn('id', $ids);
            $fieldName = $model->getFieldName();

            $properties = $records->get()->map(function ($item, $key) use ($fieldName){
                return [
                    'id' => $item->id,
                    'name' => $item[$fieldName]
                ];
            });

            $records->delete();

            activity($model->getLogName())
                ->performedOn($model)
                ->causedBy($user)
                ->withProperties($properties->all())
                ->log('Mass delete');
        
        alert()->success('Data berhasil dihapus');
        } catch (Exception $e) {
            report($e);
            Helper::ErrorHandler('Data gagal dihapus', $e->getMessage());
        }
        return redirect($request->url);
    }

    private function getClassFile($file_type)
    {
        $fileClass = false;
        switch($file_type){
            case 'csv':
                $fileClass = \Maatwebsite\Excel\Excel::CSV;
                break;
            case 'xlsx':
                $fileClass = \Maatwebsite\Excel\Excel::XLSX;
                break;
                break;
            case 'pdf':
                $fileClass = \Maatwebsite\Excel\Excel::MPDF;
                break;
        }
        return $fileClass;
    }

    public function singleExport(Request $request)
    {
        $table = $request->table;
        $file_type = $request->file_type;
        $file_name = $table."_".date("dmy").".".$file_type;
        $agamaReport = new MasterExport($table, [$request->id]);
        return Excel::download($agamaReport, $file_name, $this->getClassFile($file_type));
    }

    public function export(Request $request)
    {
        $ids = [];
        $table = $request->table;
        $file_type = $request->file_type;
        $file_name = $table."_".date("dmy").".".$request->file_type;
        foreach($request->all() as $key => $value){
            if(preg_match('/record_id/i', $key)){
                array_push($ids, $value);
            }
        }
        
        $agamaReport = new MasterExport($table, $ids);
        return Excel::download($agamaReport, $file_name, $this->getClassFile($file_type));
    }

    public function import(Request $request)
    {
        try{
            $table = $request->table;
            $masterImport = new MasterImport($table);
            Excel::import($masterImport, request()->file('file'));
        } catch (Exception $e) {
            report($e);
            Helper::ErrorHandlerAPI('Data gagal dihapus', $e->getMessage());
        }        
    }
}
