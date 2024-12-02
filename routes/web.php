<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SkpiController;
use App\Http\Controllers\DversiController;

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

Route::get('/', function () {
    return view('landing');
});
Route::get('/landing', function () {
    return view('landing');
})->name('landing');


Route::get('/dversi/{nim}/{nik}', [DversiController::class, 'show'])->name('dversi');
Route::get('/dversi/admin', [DversiController::class, 'admin'])->name('dversi-admin');


Route::get('/skpi/{nim}/{pisn}', [SkpiController::class, 'show'])->name('skpi');
Route::get('/skpi/admin', function () {
    return view('/skpi/admin');
})->name('admin');

Route::get('/cek/{id}', [SkpiController::class, 'cek'])->name('cek');

Route::get('/skpi/admin', [SkpiController::class, 'admin'])->name('admin');
Route::post('/skpi/kirim', [SkpiController::class, 'store'])->name('kirim');
Route::post('/dversi/kirim', [DversiController::class, 'store'])->name('dversi-ijazah-kirim');
