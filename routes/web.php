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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','HomeController@index');
// Route::post('/siswa/create','SiswaController@create');

Route::get('/hello','HelloController@hello');
Route::get('/dashboard','DashboardController@dashboard');
Route::get('/awal','AwalController@awal');
