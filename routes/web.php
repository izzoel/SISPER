<?php

use App\Http\Controllers\Portal;
use App\Http\Controllers\ForpiNik;
use App\Http\Controllers\DversiNik;
use App\Http\Controllers\ForpiPisn;
use App\Http\Controllers\DversiPisn;
use App\Http\Controllers\ForpiEntry;
use App\Http\Controllers\ForpiLapor;
use App\Http\Controllers\DversiEntry;
use App\Http\Controllers\DversiLapor;
use App\Http\Controllers\ForpiSubmit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DversiSubmit;
use App\Http\Controllers\ForpiSetting;
use App\Http\Controllers\DversiSetting;
use App\Http\Middleware\MenuMiddleware;
use App\Http\Controllers\ForpiMahasiswa;
use App\Http\Controllers\DversiMahasiswa;
use App\Http\Controllers\ForpiController;
use App\Http\Controllers\DversiController;
use App\Http\Middleware\AdminOnlyMiddleware;

Route::get('/', function () {
    return view('guest.landing');
})->name('landing');

Route::post('/portal/forpi', [Portal::class, 'forpi']);
Route::post('/portal/dversi', [Portal::class, 'dversi']);

Route::get('/portal/logout', [Portal::class, 'logout'])->name('logout');

Route::middleware([MenuMiddleware::class])->group(function () {
    Route::get('/forpi', [ForpiController::class, 'index'])->name('forpi');
    Route::get('/dversi', [DversiController::class, 'index'])->name('dversi');

    Route::prefix('forpi')->group(function () {
        Route::get('/submit', [ForpiSubmit::class, 'index'])->name('forpi_submit');
        Route::get('/submit/show/{nim}', [ForpiSubmit::class, 'show'])->name('forpi_submit_show');
        Route::post('/submit/store', [ForpiSubmit::class, 'store'])->name('forpi_submit_store');
        Route::post('/submit/lapor/{menu}/{nim}', [ForpiSubmit::class, 'lapor'])->name('forpi_submit_lapor');
    });
    Route::prefix('dversi')->group(function () {
        Route::get('/submit', [DversiSubmit::class, 'index'])->name('dversi_submit');
        Route::get('/submit/show/{nim}', [DversiSubmit::class, 'show'])->name('dversi_submit_show');
        Route::post('/submit/store', [DversiSubmit::class, 'store'])->name('dversi_submit_store');
        Route::post('/submit/lapor/{menu}/{nim}', [DversiSubmit::class, 'lapor'])->name('dversi_submit_lapor');
    });

    Route::middleware([AdminOnlyMiddleware::class])->group(function () {
        // Grup untuk semua route yang berawalan /forpi
        Route::prefix('forpi')->group(function () {
            Route::get('/dashboard', [ForpiController::class, 'dashboard'])->name('forpi_dashboard');
            Route::get('/chart', [ForpiController::class, 'chart'])->name('forpi_chart');

            // Entry
            Route::prefix('entry')->group(function () {
                Route::get('/', [ForpiEntry::class, 'index'])->name('forpi_entry');
                Route::get('/table', [ForpiEntry::class, 'table'])->name('forpi_entry_table');
                Route::get('/print/{nim}', [ForpiEntry::class, 'print'])->name('forpi_entry_print');
                Route::get('/resubmit/{nim}', [ForpiEntry::class, 'resubmit'])->name('forpi_entry_resubmit');
            });

            // Mahasiswa
            Route::prefix('mahasiswa')->group(function () {
                Route::get('/', [ForpiMahasiswa::class, 'index'])->name('forpi_mahasiswa');
                Route::get('/table', [ForpiMahasiswa::class, 'table'])->name('forpi_mahasiswa_table');
                Route::get('/show/{nim}', [ForpiMahasiswa::class, 'show'])->name('forpi_mahasiswa_show');
                Route::post('/store', [ForpiMahasiswa::class, 'store'])->name('forpi_mahasiswa_store');
                Route::post('/import', [ForpiMahasiswa::class, 'import'])->name('forpi_mahasiswa_import');
                Route::put('/update/{nim}', [ForpiMahasiswa::class, 'update'])->name('forpi_mahasiswa_update');
                Route::delete('/destroy/{nim}', [ForpiMahasiswa::class, 'destroy'])->name('forpi_mahasiswa_destroy');
            });

            // Pisn
            Route::post('/pisn/import', [ForpiPisn::class, 'import'])->name('forpi_pisn_import');

            // NIK
            Route::post('/nik/import', [ForpiNik::class, 'import'])->name('forpi_nik_import');

            // Setting
            Route::prefix('setting')->group(function () {
                Route::get('/', [ForpiSetting::class, 'index'])->name('forpi_setting');
                Route::get('/fakultas', [ForpiSetting::class, 'fakultas'])->name('forpi_setting_fakultas');
                Route::get('/prodi', [ForpiSetting::class, 'prodi'])->name('forpi_setting_prodi');
                Route::get('/rektor', [ForpiSetting::class, 'rektor'])->name('forpi_setting_rektor');
                Route::get('/fakultas/show/{id}', [ForpiSetting::class, 'show_fakultas']);
                Route::get('/prodi/show/{id}', [ForpiSetting::class, 'show_prodi']);
                Route::get('/rektor/show/{id}', [ForpiSetting::class, 'show_rektor']);
                Route::put('/fakultas/update/{id}', [ForpiSetting::class, 'update_fakultas']);
                Route::put('/prodi/update/{id}', [ForpiSetting::class, 'update_prodi']);
                Route::put('/rektor/update/{id}', [ForpiSetting::class, 'update_rektor']);
            });

            // Lapor
            Route::prefix('lapor')->group(function () {
                Route::get('/', [ForpiLapor::class, 'index'])->name('forpi_lapor');
                Route::get('/table', [ForpiLapor::class, 'table'])->name('forpi_lapor_table');
                Route::get('/status', [ForpiLapor::class, 'status'])->name('forpi_lapor_status');
            });
        });

        // Route untuk Dversi tetap di luar grup /forpi
        Route::prefix('dversi')->group(function () {
            Route::get('/dashboard', [DversiController::class, 'dashboard'])->name('dversi_dashboard');
            Route::get('/chart', [DversiController::class, 'chart'])->name('dversi_chart');

            // Entry
            Route::prefix('entry')->group(function () {
                Route::get('/', [DversiEntry::class, 'index'])->name('dversi_entry');
                Route::get('/table', [DversiEntry::class, 'table'])->name('dversi_entry_table');
                // Route::get('/pdf/{nim}', [DversiEntry::class, 'pdf'])->name('dversi_entry_pdf');
                Route::get('/pdf/{nim}', [DversiEntry::class, 'pdf'])->name('dversi_entry_pdf');
                Route::get('/ijazah/{periode}/{yudisium}', [DversiEntry::class, 'ijazah'])->name('dversi_entry_ijazah');
                Route::get('/proses/{nim}', [DversiEntry::class, 'proses']);
                Route::get('/show', [DversiEntry::class, 'show']);
            });

            // Mahasiswa
            Route::prefix('mahasiswa')->group(function () {
                Route::get('/', [DversiMahasiswa::class, 'index'])->name('dversi_mahasiswa');
                Route::get('/table', [DversiMahasiswa::class, 'table'])->name('dversi_mahasiswa_table');
                Route::get('/show/{nim}', [DversiMahasiswa::class, 'show'])->name('dversi_mahasiswa_show');
                Route::post('/store', [DversiMahasiswa::class, 'store'])->name('dversi_mahasiswa_store');
                Route::post('/import', [DversiMahasiswa::class, 'import'])->name('dversi_mahasiswa_import');
                Route::put('/update/{nim}', [DversiMahasiswa::class, 'update'])->name('dversi_mahasiswa_update');
                Route::delete('/destroy/{nim}', [DversiMahasiswa::class, 'destroy'])->name('dversi_mahasiswa_destroy');
            });

            // PISN
            Route::post('/pisn/import', [DversiPisn::class, 'import'])->name('dversi_pisn_import');

            // NIK
            Route::post('/nik/import', [DversiNik::class, 'import'])->name('dversi_nik_import');

            // Setting
            Route::prefix('setting')->group(function () {
                Route::get('/', [DversiSetting::class, 'index'])->name('dversi_setting');
                Route::get('/fakultas', [DversiSetting::class, 'fakultas'])->name('dversi_setting_fakultas');
                Route::get('/prodi', [DversiSetting::class, 'prodi'])->name('dversi_setting_prodi');
                Route::get('/rektor', [DversiSetting::class, 'rektor'])->name('dversi_setting_rektor');
                Route::get('/fakultas/show/{id}', [DversiSetting::class, 'show_fakultas']);
                Route::get('/prodi/show/{id}', [DversiSetting::class, 'show_prodi']);
                Route::get('/rektor/show/{id}', [DversiSetting::class, 'show_rektor']);
                Route::put('/fakultas/update/{id}', [DversiSetting::class, 'update_fakultas']);
                Route::put('/prodi/update/{id}', [DversiSetting::class, 'update_prodi']);
                Route::put('/rektor/update/{id}', [DversiSetting::class, 'update_rektor']);
            });

            // Lapor
            Route::prefix('lapor')->group(function () {
                Route::get('/', [DversiLapor::class, 'index'])->name('dversi_lapor');
                Route::get('/table', [DversiLapor::class, 'table'])->name('dversi_lapor_table');
                Route::get('/status', [DversiLapor::class, 'status'])->name('dversi_lapor_status');
            });
        });
    });
});
