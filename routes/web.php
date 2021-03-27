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
Route::get('/', 'admin\HomeController@Home')->name('admin-home');
Route::get('/user/login','user\AuthController@loginpage')->name('user-login');
Route::post('/login/submit','user\AuthController@loginuser')->name('user-login-submit');
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'admin\HomeController@Home')->name('admin-home');
    Route::get('/login','admin\AuthController@loginpage')->name('admin-login');
    Route::post('/login/submit','admin\AuthController@loginadmin')->name('admin-login-submit');
    Route::get('/logout','admin\AuthController@logout')->name('admin-logout');
    Route::get('/', 'admin\HomeController@Home')->name('admin-home');
    Route::get('/{id}/delete', 'admin\ValidatorController@destroy')->name('dosen-delete');
    Route::get('/detail/dosen/{id}', 'admin\ValidatorController@detailDosen')->name('dosen-detail');
    Route::get('/create', 'admin\ValidatorController@index')->name('dosen-createpage');
    Route::post('/store', 'admin\ValidatorController@store')->name('dosen-store');
    Route::get('/penelitian', 'admin\PenelitianController@index')->name('penelitian-list');
    Route::get('/pengabdian', 'admin\PengabdianController@index')->name('pengabdian-list');
    Route::get('/kompetensi', 'admin\KompetensiController@index')->name('kompetensi-list');
});

Route::prefix('user')->group(function () {
    Route::get('/dashboard', 'admin\HomeController@Home')->name('user-home');
});
