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
use Hash;

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
        config(['active_nav' => 'Home']);
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

    public function home()
    {
        return view('admin.adminDasboard');
    }

    public function viewProfil()
    {
        $user = Auth::user();
        $user_type = $user->kode_dosen ? 'dosen' : 'admin';        
        return view('admin.viewMaster.viewProfil', ['user_type' => $user_type]);
    }


    public function editProfil()
    {
        $user = Auth::user();
        $user_type = $user->kode_dosen ? 'dosen' : 'admin';
        return view('admin.formMaster.formProfil', ['user_type' => $user_type]);
    }

    public function upateProfil(Request $request)
    {
        try {
            $user = Auth::user();
            switch ($request->user_type) {
                case 'dosen':
                    
                break;
                
                default:

                    $user->nama_user = $request->nama_user;
                    $user->email = $request->email;
                    $user->save();
                break;
            }

            alert()->success('Data berhasil diupdate');
        } catch (Exception $e) {
            report($e);
            Helper::ErrorHandler('Data gagal diupdate', $e->getMessage());
        }
        return redirect('/admin/profil');
    }

    public function editPassword()
    {
        return view('admin.formMaster.formPassword');
    }

    public function updatePassword(Request $request)
    {
        try {
            $user = Auth::user();
            $password = $request->password_baru;
            if (Hash::check($request->password_lama, $user->password)) {
                if ($password == $request->konfirmasi_password_baru) {
                    $password = Hash::make($password);
                    $user->password = $password;
                    $user->save();
                    alert()->success('Password berhasil diganti');
                }else{
                    alert()->error('Konfirmasi Password tidak sama');
                }
            }else{
                alert()->error('Password lama tidak cocok');
            }
        } catch (Exception $e) {
            report($e);
            Helper::ErrorHandler('Password gagal diganti', $e->getMessage());
        }
        
        return redirect('/admin/profil');
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
