<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use App\Models\master_agama;
use App\Models\master_module;
use Illuminate\Support\Facades\Gate;
use Alert;
use Exception;
use Helper;

class FromAgamaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $module_name = master_agama::getLogName();
        $master_agama_module = master_module::where('nama_module', $module_name)->first();
        $this->middleware('CheckAuth:'.$master_agama_module->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agamas = DB::table('master_agamas');
        $keyword = '';
        if(isset($request->keyword)){
            $agamas = $agamas->where('nama_agama', 'like', '%'.$request->keyword.'%');
            $keyword = $request->keyword;
        }
        $agamas = $agamas->paginate(20)->setPath('');
        $agamas->appends(array('keyword' => $keyword));
        
        $logs = Activity::inLog('Master Agama')->orderByDesc('created_at')->get();
        return view('admin/tableMaster.tableAgama', ['agamas' => $agamas, 'logs' => $logs, 'keyword' => $keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/formMaster.formAgama', ['mode' => 'POST']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $agama = new master_agama;
            $agama->nama_agama = $request->input('agama');
            $agama->save();
            alert()->success('Data berhasil ditambahkan');
        } catch (Exception $e) {
            report($e);
            Helper::ErrorHandler('Data gagal ditambahkan', $e->getMessage());
        }
        return redirect('/admin/inputagama');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agama = master_agama::where('id', $id)->first();
        return view('admin/viewMaster.viewAgama', ['agama' => $agama]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $agama = DB::table('master_agamas')->where('id', $id)->first();
        return view('admin/formMaster.formAgama', ['agama' => $agama, 'mode' => 'PATCH']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $agama = master_agama::find($id);
            $agama->nama_agama = $request->input('agama');
            $agama->save();
            alert()->success('Data berhasil diubah');
        } catch (Exception $e) {
            report($e);
            Helper::ErrorHandler('Data gagal diubah', $e->getMessage());
        }
        return redirect('/admin/inputagama/'.$id);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            master_agama::find($id)->delete();
            alert()->success('Data berhasil dihapus');
        } catch (Exception $e) {
            Helper::ErrorHandler('Data gagal dihapus', $e->getMessage());
        }
        
        return redirect('/admin/inputagama');
    }
}
