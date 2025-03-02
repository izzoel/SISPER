<?php

use App\Http\Controllers\Portal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForpiMahasiswa;
use App\Http\Controllers\ForpiController;
use App\Http\Middleware\MenuMiddleware;

Route::get('/', function () {
    return view('guest.landing');
})->name('landing');

Route::post('/portal/forpi', [Portal::class, 'forpi']);

Route::get('/portal/logout', [Portal::class, 'logout'])->name('logout');

Route::middleware([MenuMiddleware::class])->group(function () {
    Route::get('/forpi', [ForpiController::class, 'index'])->name('forpi');

    Route::get('/forpi/mahasiswa', [ForpiMahasiswa::class, 'index'])->name('forpi_mahasiswa');
    Route::get('/forpi/mahasiswa/show/{nim}', [ForpiMahasiswa::class, 'show'])->name('forpi_mahasiswa_show');
    Route::post('/forpi/mahasiswa/store', [ForpiMahasiswa::class, 'store'])->name('forpi_mahasiswa_store');
    Route::post('/forpi/mahasiswa/import', [ForpiMahasiswa::class, 'import'])->name('forpi_mahasiswa_import');
    Route::put('/forpi/mahasiswa/update/{nim}', [ForpiMahasiswa::class, 'update'])->name('forpi_mahasiswa_update');
    Route::delete('/forpi/mahasiswa/destroy/{nim}', [ForpiMahasiswa::class, 'destroy'])->name('forpi_mahasiswa_destroy');
});
