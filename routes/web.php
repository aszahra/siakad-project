<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiswaControlller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('ruang',RuangController::class)->middleware(['auth']);

Route::resource('jurusan',JurusanController::class)->middleware(['auth']);

Route::resource('kelas',KelasController::class)->middleware(['auth']);

Route::resource('mahasiswa',MahasiswaControlller::class)->middleware(['auth']);


require __DIR__.'/auth.php';
