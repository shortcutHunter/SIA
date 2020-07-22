<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Exports\MasterExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
            $tableName = $request->table;
            $model = false;
            $className = 'App\\Models\\' . substr($tableName, 0, -1);
            if(class_exists($className)) {
                $model = new $className;
            }

            foreach($request->all() as $key => $value){
                if(preg_match('/record_id/i', $key)){
                    array_push($ids, $value);
                }
            }
            DB::table($request->table)->whereIn('id', $ids)->delete();

            activity()
                ->performedOn($model)
                ->causedBy($user)
                ->withProperties(['ids' => $ids])
                ->log('Mass delete');

        } catch (Throwable $e) {
            report($e);
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
}
