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

Route::prefix('admin')->group(function () {
    Route::get('/', 'admin\HomeController@Home')->name('admin-home');
    Route::get('/{id}/delete', 'ValidatorController@destroy')->name('dosen-delete');
    Route::get('/create', 'ValidatorController@index')->name('dosen-createpage');
    Route::post('/store', 'ValidatorController@store')->name('dosen-store');
});
