<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bukucontroller;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PerlengkapanController;

Route::get('/', function () {
    return redirect()->route('perlengkapan.index');
});

Route::get('/perlengkapan', [PerlengkapanController::class, 'index'])->name('perlengkapan.index');
Route::get('/perlengkapan/create', [PerlengkapanController::class, 'create'])->name('perlengkapan.create');
Route::post('/perlengkapan', [PerlengkapanController::class, 'store'])->name('perlengkapan.store');
Route::get('/perlengkapan/{kode}', [PerlengkapanController::class, 'show'])->name('perlengkapan.show');
Route::get('/perlengkapan/{kode}/edit', [PerlengkapanController::class, 'edit'])->name('perlengkapan.edit');
Route::put('/perlengkapan/{kode}', [PerlengkapanController::class, 'update'])->name('perlengkapan.update');
Route::delete('/perlengkapan/{kode}', [PerlengkapanController::class, 'destroy'])->name('perlengkapan.destroy');
?>