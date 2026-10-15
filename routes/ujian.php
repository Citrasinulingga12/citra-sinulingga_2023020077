<?php

use App\Http\Controllers\UjianController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:student'])->group(function () {
    Route::get('/ujian/exam/{subject}', [UjianController::class, 'exam'])->name('ujian.exam');
    Route::post('/ujian/exam/{subject}/submit', [UjianController::class, 'submit'])->name('ujian.submit');
    Route::get('/ujian/histori/{examResult}', [UjianController::class, 'histori'])->name('ujian.histori');
    Route::get('/ujian/detail/{examResult}', [UjianController::class, 'detail'])->name('ujian.detail');
});
