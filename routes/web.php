<?php

use App\Http\Controllers\Portal;
use App\Http\Controllers\ForpiPisn;
use App\Http\Controllers\ForpiEntry;
use App\Http\Controllers\ForpiSubmit;
use App\Http\Controllers\ForpiMahasiswa;
use App\Http\Controllers\ForpiController;
use App\Http\Middleware\AdminOnlyMiddleware;
use App\Http\Middleware\MenuMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest.landing');
})->name('landing');

Route::post('/portal/forpi', [Portal::class, 'forpi']);

Route::get('/portal/logout', [Portal::class, 'logout'])->name('logout');

Route::middleware([MenuMiddleware::class])->group(function () {
    Route::get('/forpi/doc', [ForpiSubmit::class, 'doc']);

    Route::get('/forpi/submit', [ForpiSubmit::class, 'index'])->name('forpi_submit');
    Route::post('/forpi/submit/store', [ForpiSubmit::class, 'store'])->name('forpi_submit_store');
    Route::get('/forpi', [ForpiController::class, 'index'])->name('forpi');

    Route::middleware([AdminOnlyMiddleware::class])->group(function () {
        Route::get('/forpi/dashboard', [ForpiController::class, 'dashboard'])->name('forpi_dashboard');
        Route::get('/forpi/chart', [ForpiController::class, 'chart'])->name('forpi_chart');

        Route::get('/forpi/entry', [ForpiEntry::class, 'index'])->name('forpi_entry');
        Route::get('/forpi/entry/table', [ForpiEntry::class, 'table'])->name('forpi_entry_table');
        Route::get('/forpi/entry/print/{nim}', [ForpiEntry::class, 'print'])->name('forpi_entry_print');

        Route::get('/forpi/mahasiswa', [ForpiMahasiswa::class, 'index'])->name('forpi_mahasiswa');
        Route::get('/forpi/mahasiswa/table', [ForpiMahasiswa::class, 'table'])->name('forpi_mahasiswa_table');
        Route::get('/forpi/mahasiswa/show/{nim}', [ForpiMahasiswa::class, 'show'])->name('forpi_mahasiswa_show');
        Route::post('/forpi/mahasiswa/store', [ForpiMahasiswa::class, 'store'])->name('forpi_mahasiswa_store');
        Route::post('/forpi/mahasiswa/import', [ForpiMahasiswa::class, 'import'])->name('forpi_mahasiswa_import');
        Route::put('/forpi/mahasiswa/update/{nim}', [ForpiMahasiswa::class, 'update'])->name('forpi_mahasiswa_update');
        Route::delete('/forpi/mahasiswa/destroy/{nim}', [ForpiMahasiswa::class, 'destroy'])->name('forpi_mahasiswa_destroy');

        Route::post('/forpi/pisn/import', [ForpiPisn::class, 'import'])->name('forpi_pisn_import');
    });
});
