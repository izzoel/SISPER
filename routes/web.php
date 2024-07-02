<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkpiController;
use Illuminate\Support\Facades\Storage;

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
Route::get('/skpi', function () {
    return view('/skpi/skpi');
})->name('skpi');
Route::get('/skpi/admin', function () {
    return view('/skpi/admin');
})->name('admin');

Route::get('/skpi/cek/{id}', [SkpiController::class, 'cek'])->name('cek');
Route::get('/skpi/admin', [SkpiController::class, 'admin'])->name('admin');
Route::post('/kirim', [SkpiController::class, 'store'])->name('kirim');
