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
Route::get('/','HomeController@index');
// Route::post('/siswa/create','SiswaController@create'); 

Route::post('/loginProses','LoginController@loginProses');
Route::get('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');;
Route::get('/hello','HelloController@hello');


Route::group(['middleware' => ['auth','checkRole:ADM,USR']], function () {
    Route::get('/dashboard','DashboardController@dashboard');
    Route::get('/awal','AwalController@awal');
    Route::get('/admin/user','UserController@user');
    Route::get('/admin/getuser','UserController@getUser');
    Route::post('/admin/adduser','UserController@addUser');
    Route::get('/admin/getuserbyid/{id}','UserController@getUserbyUserId');
    Route::get('/admin/delUserbyId/{id}','UserController@delUserbyId');

    
    Route::get('/parameter','ParameterController@parameter');

    // Divisi
    Route::get('/admin/divisi','DivisiController@divisi')->name('divisi');
    Route::get('/admin/getdivisi','DivisiController@getdivisi')->name('divisi');
    Route::post('/admin/adddivisi','DivisiController@adddivisi');
    Route::get('/admin/getdivisibyid/{id}','DivisiController@getdivisibyid');
    Route::get('/admin/deldivisibyid/{id}','DivisiController@deldivisibyid');
    Route::get('/admin/getalldivisi','DivisiController@getAllDivisi');
    // Role
    Route::get('/admin/getallrole','DivisiController@getallrole');
    
    //Departemen
    Route::get('/admin/departement','DepartementController@departement');
    Route::post('/admin/adddepartement','DepartementController@adddepartement');
    Route::get('/admin/getdepartement','DepartementController@getdepartement');
    Route::get('/admin/getdepartementbyid/{id}','DepartementController@getdepartementbyid');
    
    // Route::get('/admin/divisi/{id}/divisiedit','DivisiController@divisiedit');
    // Route::post('/admin/divisi/{id}/divisiupdate','DivisiController@divisiupdate');
    // Route::get('/admin/divisi/{id}/divisidelete','DivisiController@divisidelete');
    // Route::get('/job/proker/{id}/prokeredit','ProkerController@prokeredit');
});
