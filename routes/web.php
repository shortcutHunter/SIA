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

Route::get('/admin', 'HomeController@home');

// profil
Route::get('/admin/profil', 'HomeController@viewProfil');
Route::get('/admin/edit/profil', 'HomeController@editProfil');
Route::put('/admin/update/profil', 'HomeController@upateProfil');

// password
Route::get('/admin/edit/password', 'HomeController@editPassword');
Route::put('/admin/update/password', 'HomeController@updatePassword');


// form master perkuliahan
Route::resource('/admin/inputtahunajaran', 'FromTahunAjaranController');
Route::resource('/admin/inputmatakuliah', 'FromMataKuliahController');
Route::resource('/admin/jadwal-kuliah', 'FromJadwalKuliahController');
Route::resource('/admin/jurusan', 'FromMasterJurusanController');


// form master data diri
Route::resource('/admin/inputagama', 'FromAgamaController');
Route::resource('/admin/inputpendidikan', 'FromPendidikanController');

// form master karyawan
Route::resource('/admin/dosen', 'FromDosenController');

// form master status
Route::resource('/admin/master-role', 'FromMasterRoleController');
Route::resource('/admin/ruang-kuliah', 'FromMasterRuangKuliahController');
Route::resource('/admin/jenis-perkuliahan', 'FromMasterJenisPerkuliahanController');
Route::resource('/admin/status-dosen', 'FormStatusDosenController');
Route::resource('/admin/status-kerja-dosen', 'FormMasterStatusKerjaDosenController');


// public route
Route::post('/admin/master/delete', 'HomeController@delete');

// export route
Route::get('{table}/export/{file_type}/{id}', 'HomeController@singleExport');
Route::post('master/export/file', 'HomeController@export');

// import file
Route::post('master/import/file', 'HomeController@import');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
