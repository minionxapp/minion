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
Route::get('/test','AwalController@awal');
// Route::get('/','HomeController@index');
// Route::post('/siswa/create','SiswaController@create'); 

Route::post('/loginProses','LoginController@loginProses');
Route::get('/login','LoginController@login')->name('login');
Route::get('/','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');;
Route::get('/hello','HelloController@hello');

Route::get('/calendar','CalendarController@calendar');
Route::group(['middleware' => ['auth','checkRole:ADM']], function () {
    Route::get('/admin/user','UserController@user');
    Route::get('/admin/getuser','UserController@getUser');
    Route::post('/admin/adduser','UserController@addUser');
    Route::get('/admin/getuserbyuserid/{id}','UserController@getUserbyUserId');
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


    
});

Route::group(['middleware' => ['auth','checkRole:ADM,USR']], function () {
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
 
    //Walet TransaksiAdmin
    Route::get('/walet/wtransaksiadmin','WTransaksiAdminController@wtransaksiadmin');
    Route::get('/walet/getwtransaksiadmin','WTransaksiAdminController@getwtransaksiadmin');
    Route::post('/walet/addwtransaksiadmin','WTransaksiAdminController@addwtransaksiadmin');
    // Route::get('/walet/wtransaksiadmin/{id}','WTransaksiAdminController@getwtransaksiuser_byid');
    // Route::get('/walet/wtransaksiadmin/{id}','WTransaksiAdminController@delwtransaksiuserbyid');
 


    // Route::get('/admin/divisi/{id}/divisiedit','DivisiController@divisiedit');
    // Route::post('/admin/divisi/{id}/divisiupdate','DivisiController@divisiupdate');
    // Route::get('/admin/divisi/{id}/divisidelete','DivisiController@divisidelete');
    // Route::get('/job/proker/{id}/prokeredit','ProkerController@prokeredit');
});
