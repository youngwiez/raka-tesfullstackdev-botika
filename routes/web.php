<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PekerjaanController;

Route::get('/', function () {
    return redirect('/karyawan');
});

Route::get('/pekerjaan', function () {
    return redirect('/pekerjaan');
});

Route::resource('karyawan', KaryawanController::class);
Route::resource('pekerjaan', PekerjaanController::class);