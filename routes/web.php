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

// Route::get('/test', function () {
//     return view('awal');
// });
Route::get('/test2','AwalController@awal');
Route::get('/','HomeController@index');
// Route::post('/siswa/create','SiswaController@create'); 

Route::post('/loginProses','LoginController@loginProses');
// Route::get('/login','LoginController@login')->name('login');
Route::get('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');;
Route::get('/hello','HelloController@hello');
//tes UPLOAD FILE
Route::get('/upload','UploadController@upload');
// Route::get("create", "ImageController@create");
Route::post("/store", "UploadController@store")->name("store");
Route::get("/showimage", "UploadController@showimage");
//-------------

Route::get('/calendar','CalendarController@calendar');
Route::group(['middleware' => ['auth','checkRole:ADM,ADLW']], function () {
    Route::get('/admin/user','UserController@user');
    Route::get('/admin/getuser','UserController@getUser');
    Route::post('/admin/adduser','UserController@addUser');
    Route::get('/admin/getuserbyid/{id}','UserController@getuserbyid');
    Route::get('/admin/delUserbyId/{id}','UserController@delUserbyId');
    //DIVISI
    Route::get('/admin/divisi','DivisiController@divisi')->name('divisi');
    Route::get('/admin/getdivisi','DivisiController@getdivisi')->name('divisi');
    Route::post('/admin/adddivisi','DivisiController@adddivisi');
    Route::get('/admin/getdivisibyid/{id}','DivisiController@getdivisibyid');
    Route::get('/admin/getdivisibydivisi_kode/{id}','DivisiController@getdivisibydivisi_kode');
    
    Route::get('/admin/deldivisibyid/{id}','DivisiController@deldivisibyid');
    
    //Deparetement
    Route::get('/admin/departement','DepartementController@departement');
    Route::post('/admin/adddepartement','DepartementController@adddepartement');
    Route::get('/admin/getdepartement','DepartementController@getdepartement');
    

//GLEADS ADMIN
    Route::get('/gleads/gleadstraining','GleadsTrainingController@gleadstraining');
    Route::get('/gleads/listGleadstraining','GleadsTrainingController@listGleadstraining');
    Route::get('/gleads/getGleadstrainingById/{id}','GleadsTrainingController@getGleadstrainingById');
    Route::post('/gleads/addGleadstraining','GleadsTrainingController@addGleadstraining');
    Route::get('/gleads/delGleadstraining/{id}','GleadsTrainingController@delGleadstraining');
    
    
});

Route::group(['middleware' => ['auth','checkRole:ADM,ADLW,USR']], function () {
    Route::get('/admin/getuserbyuserid/{id}','UserController@getUserbyUserId');
    Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
    Route::get('/awal','AwalController@awal');
    Route::get('/parameter','ParameterController@parameter');

    // Divisi    
    Route::get('/admin/getalldivisi','DivisiController@getAllDivisi');
    // Role
    Route::get('/admin/getallrole','RoleController@getallrole');
    
    //Departemen
   
    Route::get('/admin/getdepartementbyid/{id}','DepartementController@getdepartementbyid');
    Route::get('/admin/getalldepartement','DepartementController@getalldepartement');

    Route::get('/admin/getdepartementbydivisi/{id}','DepartementController@getdepartementbydivisi');
    Route::get('/admin/deldepartementbyid/{id}','DepartementController@deldepartementbyid');
    Route::get('/admin/getdepartementbykode/{id}','DepartementController@getdepartementbykode');
    
    
    // EVENT
    Route::get('/corpuevent','CorpuEventController@corpuevent');
    Route::get('/getallevent','CorpuEventController@getallevent');
    Route::post('/addevent','CorpuEventController@addevent');
    Route::get('/geteventbyid/{id}','CorpuEventController@geteventbyid');
    Route::get('/deleventbyid/{id}','CorpuEventController@deleventbyid');
    Route::get('/getalleventapi','CorpuEventController@getalleventapi');
    

    //WALET
    Route::get('/walet/wperiode','WPeriodeController@wperiode');
    Route::get('/walet/getwperiode','WPeriodeController@getwperiode');
    Route::post('/walet/addwperiode','WPeriodeController@addwperiode');
    Route::get('/walet/getwperiodebyid/{id}','WPeriodeController@getwperiodebyid');
    Route::get('/walet/delwperiodebyid/{id}','WPeriodeController@delwperiodebyid');
    
    //----
    Route::get('/walet/wmember','WMemberController@wmember');
    Route::get('/walet/getwmember','WMemberController@getwmember');
    Route::post('/walet/addwmember','WMemberController@addwmember');
    Route::get('/walet/delwmemberbyid/{id}','WMemberController@delwmemberbyid');
    Route::get('/walet/getwmemberbyid/{id}','WMemberController@getwmemberbyid');
    
    //Walet TransaksiUser
    Route::get('/walet/wtransaksiuser','WTransaksiUserController@wtransaksiuser');
    Route::get('/walet/getwtransaksiuser','WTransaksiUserController@getwtransaksiuser');
    Route::post('/walet/addwtransaksiuser','WTransaksiUserController@addwtransaksiuser');
    Route::get('/walet/getwtransaksiuser_byid/{id}','WTransaksiUserController@getwtransaksiuser_byid');
    Route::get('/walet/delwtransaksiuserbyid/{id}','WTransaksiUserController@delwtransaksiuserbyid');
    Route::get('/walet/getwtransaksiuser_byuserid/{id}','WTransaksiUserController@getwtransaksiuser_byuserid');
    
 
    //Walet TransaksiAdmin
    Route::get('/walet/wtransaksiadmin','WTransaksiAdminController@wtransaksiadmin');
    Route::get('/walet/getwtransaksiadmin','WTransaksiAdminController@getwtransaksiadmin');
    Route::post('/walet/addwtransaksiadmin','WTransaksiAdminController@addwtransaksiadmin');
    // Route::get('/walet/wtransaksiadmin/{id}','WTransaksiAdminController@getwtransaksiuser_byid');
    // Route::get('/walet/wtransaksiadmin/{id}','WTransaksiAdminController@delwtransaksiuserbyid');
 
// Walet trans histori
    Route::get('/walet/wtranshistori','WTransHistoriController@wtranshistori');
    Route::get('/walet/getwtranshistoriuser','WTransHistoriController@getwtranshistoriuser');
    // Route::post('/walet/addwtransaksiadmin','WTransHistoriController@addwtransaksiadmin');
    // Route::get('/walet/wtransaksiadmin/{id}','WTransHistoriController@getwtransaksiuser_byid');
    // Route::get('/walet/wtransaksiadmin/{id}','WTransHistoriController@delwtransaksiuserbyid');

    // Walet trans  TanggungJawabController
    Route::get('/walet/wtranstanggungjawab','WTransTanggungJawabController@wtranstanggungjawab');
    Route::get('/walet/getwtranstanggungjawab','WTransTanggungJawabController@getwtranstanggungjawab');
    Route::post('/walet/addwtranstanggungjawab','WTransTanggungJawabController@addwtranstanggungjawab');
    // Route::get('/walet/wtransaksiadmin/{id}','WTransTanggungJawabController@getwtransaksiuser_byid');
    // Route::get('/walet/wtransaksiadmin/{id}','WTransTanggungJawabController@delwtransaksiuserbyid');


    //WTransJwbVerifikasi
    // Walet trans  TanggungJawabController
    Route::get('/walet/wtransjwbverifikasi','WTransJwbVerifikasiController@wtransjwbverifikasi');
    Route::get('/walet/getwtransjwbverifikasi','WTransJwbVerifikasiController@getwtransjwbverifikasi');
    Route::post('/walet/addwtransjwbverifikasi','WTransJwbVerifikasiController@addwtransjwbverifikasi');
    
    // Route::get('/walet/wtransaksiadmin/{id}','WTransJwbVerifikasiController@delwtransaksiuserbyid');

    //WDaftarBayarController
    Route::get('/walet/wdaftarbayar','WDaftarBayarController@wdaftarbayar');
    Route::post('/walet/addwdaftarbayar','WDaftarBayarController@addwdaftarbayar');
    Route::get('/walet/getwdaftarbayar','WDaftarBayarController@getwdaftarbayar');
    Route::get('/walet/getwdaftarbayarbyid/{id}','WDaftarBayarController@getwdaftarbayarbyid');
    Route::get('/walet/getdaftarbayarbystatus','WDaftarBayarController@getdaftarbayarbystatus');
    Route::get('/walet/repwdaftarbayar/{id}','WDaftarBayarController@repwdaftarbayar');    
    Route::get('/walet/delwdaftarbayarbyid/{id}','WDaftarBayarController@delwdaftarbayarbyid');
    Route::post('/walet/updaterepwdaftarbayar','WDaftarBayarController@updaterepwdaftarbayar');
    Route::get('/walet/winputdaftarbayar','WDaftarBayarController@winputdaftarbayar');
    Route::get('/walet/getwinputdaftarbayar','WDaftarBayarController@getwinputdaftarbayar');
    Route::post('/walet/updatedaftarbayar','WDaftarBayarController@updatedaftarbayar');
});
