<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\master_module;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Helper;

class CrudController extends Controller
{
    protected $table_name;
    protected $menu_name;
    protected $module_name;
    protected $class_name;
    protected $class_model;
    protected $view_table;
    protected $view_form;
    protected $view_data;
    protected $base_url;

    public function __construct()
    {
        $this->middleware('auth');
        $master_data = Helper::defaultConstruct($this->menu_name, $this->module_name);
        $master_module = $master_data[0];
        $master_menu = $master_data[1];
        $this->base_url = $master_menu->link;
        $this->middleware('CheckAuth:'.$master_module);
        config(['title_page' => $this->menu_name]);

        $class_model = 'App\\Models\\' . $this->class_name;
        $this->class_model = new $class_model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // init
        $keyword = '';
        $class_model = $this->class_model;
        $data = $class_model;
        $field_name = $class_model->getFieldName();

        if(isset($request->keyword)){
            $data = $class_model->where($field_name, 'like', '%'.$request->keyword.'%');
            $keyword = $request->keyword;
        }

        $data = $data->paginate(20)->setPath('');
        $data->appends(array('keyword' => $keyword));
        $log_name = $class_model->getLogName();
        $logs = Activity::inLog($log_name)->orderByDesc('created_at')->get();

        $view_data = [
            'table_name' => $this->table_name,
            'logs' => $logs,
            'datas' => $data,
            'keyword' => $keyword
        ];

        return view($this->view_table, $view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view_form, ['mode' => 'POST']);
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
            $data = new $this->class_model;
            foreach ($request->except(['_token', '_method', 'id_record']) as $key => $value) {
                $data[$key] = $value;
            }
            $data->save();
            alert()->success('Data berhasil ditambahkan');
        } catch (Exception $e) {
            report($e);
            Helper::ErrorHandler('Data gagal ditambahkan', $e->getMessage());
        }
        return redirect($this->base_url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->class_model::where('id', $id)->first();
        return view($this->view_data, ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->class_model->where('id', $id)->first();
        return view($this->view_form, ['data' => $data, 'mode' => 'PATCH']);
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
            $data = $this->class_model::find($id);

            foreach ($request->except(['_token', '_method', 'id_record']) as $key => $value) {
                $data[$key] = $value;
            }

            $data->save();
            alert()->success('Data berhasil diubah');
        } catch (Exception $e) {
            report($e);
            Helper::ErrorHandler('Data gagal diubah', $e->getMessage());
        }
        return redirect($this->base_url."/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->class_model->find($id)->delete();
            alert()->success('Data berhasil dihapus');
        } catch (Exception $e) {
            Helper::ErrorHandler('Data gagal dihapus', $e->getMessage());
        }
        
        return redirect($this->base_url);
    }
}
