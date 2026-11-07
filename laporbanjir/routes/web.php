<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

// Form laporan untuk warga
Route::get('/laporan/create', [LaporanController::class, 'create'])
    ->name('laporan.create');

Route::post('/laporan', [LaporanController::class, 'store'])
    ->name('laporan.store');

// Pengelolaan laporan
Route::resource('laporan', LaporanController::class)
    ->except(['create', 'store']);