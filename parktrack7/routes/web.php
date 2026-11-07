
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AreaController;

// Halaman utama
Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/info', function () {
    return view('pages.info');
})->name('info');

// Autentikasi
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Halaman reservasi
Route::get('/reservasi', [ReservationController::class, 'index'])
    ->name('reservasi.form');

Route::post('/reservasi/proses', [ReservationController::class, 'proses'])
    ->name('reservasi.proses');

Route::get('/reservasi/reset', [ReservationController::class, 'reset'])
    ->name('reservasi.reset');

// Denda
Route::get('/denda', [ViolationController::class, 'index'])->name('denda');
Route::post('/denda/bayar', [ViolationController::class, 'pay'])
    ->name('parktrack.denda.bayar');

// Halaman yang membutuhkan login
Route::middleware('auth')->group(function () {

    Route::get('/pembayaran', function () {
        return view('pages.pembayaran');
    })->name('pembayaran');

    Route::get('/status', function () {
        return view('pages.status');
    })->name('status');

     Route::resource('area', AreaController::class);

});
