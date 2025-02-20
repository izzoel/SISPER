<?php

use App\Livewire\Lazy;
use App\Livewire\Forpi;
use App\Livewire\Counter;
use App\Livewire\BirdForm;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('guest.landing');
})->name('landing');

Route::get('/forpi', Forpi::class)->name('forpi');

// Route::get('/bird', BirdForm::class);
Route::get('/lazy', Lazy::class)->lazy();
