<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FromAgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agamas = DB::table('master_agamas')->paginate(20);
        return view('admin/tableMaster.tableAgama', ['agamas' => $agamas]);
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
            DB::table('master_agamas')->insert(['nama_agama' => $request->input('agama')]);
        } catch (Throwable $e) {
            report($e);
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
        //
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
            DB::table('master_agamas')->where('id', $id)->update(['nama_agama' => $request->input('agama')]);
        } catch (Throwable $e) {
            report($e);
        }
        return redirect('/admin/inputagama');
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
        DB::table('master_agamas')->where('id', $id)->delete();
        return redirect('/admin/inputagama');
    }
}
