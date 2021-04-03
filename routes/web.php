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
Route::get('/login','auth\AuthController@loginpage')->name('user-login');
Route::post('/login/submit','auth\AuthController@login')->name('user-login-submit');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'admin\HomeController@Home')->name('admin-home');
    Route::get('/logout','auth\AuthController@logout')->name('admin-logout');
    Route::get('/', 'admin\HomeController@Home')->name('admin-home');
    Route::get('/{id}/delete', 'admin\ValidatorController@destroy')->name('dosen-delete');
    Route::get('/detail/dosen/{id}', 'admin\ValidatorController@detailDosen')->name('dosen-detail');
    Route::get('/listdosen', 'admin\ValidatorController@index')->name('dosen-page');
    Route::get('/create', 'admin\ValidatorController@create')->name('dosen-createpage');
    Route::post('/store', 'admin\ValidatorController@store')->name('dosen-store');
    Route::get('/penelitian', 'admin\PenelitianController@index')->name('penelitian-list');
    Route::get('/pengabdian', 'admin\PengabdianController@index')->name('pengabdian-list');
    Route::get('/kompetensi', 'admin\KompetensiController@index')->name('kompetensi-list');
    Route::get('/import/penelitian-show', 'import\ImportPenelitianController@show')->name('show-import-penelitian');
    Route::Post('/import/penelitian-review', 'import\ImportPenelitianController@view')->name('show-review-penelitian');
    Route::Post('/import/penelitian-save', 'import\ImportPenelitianController@save')->name('save-penelitian');
    Route::get('/import/dosen','admin\ValidatorController@importDosen')->name('admin-import-dosen');
    Route::post('/import/dosen/submit','admin\ValidatorController@storeImportDosen')->name('import-dosen');
    Route::get('/{id}/delete/dosen', 'admin\ValidatorController@deleteSort')->name('data-dosen-delete');
});

Route::prefix('user')->group(function () {
    Route::get('/dashboard', 'user\HomeController@Home')->name('user-home');
    Route::get('/logout','auth\AuthController@logout')->name('admin-logout');
});
