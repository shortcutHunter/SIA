<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

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
}
