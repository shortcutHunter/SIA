<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.adminDasboard');
});

// form master perkuliahan
Route::resource('/admin/inputtahunajaran', 'FromTahunAjaranController');
Route::resource('/admin/inputmatakuliah', 'FromMataKuliahController');
Route::resource('/admin/jadwal-kuliah', 'FromJadwalKuliahController');
Route::resource('/admin/jurusan', 'FromMasterJurusanController');


// form master data diri
Route::resource('/admin/inputagama', 'FromAgamaController');

// form master karyawan
Route::resource('/admin/dosen', 'FromDosenController');

// form master status
Route::resource('/admin/master-role', 'FromMasterRoleController');
Route::resource('/admin/ruang-kuliah', 'FromMasterRuangKuliahController');
Route::resource('/admin/jenis-perkuliahan', 'FromMasterJenisPerkuliahanController');


// public route
Route::post('/admin/master/delete', 'HomeController@delete');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
