<?php

use App\Http\Controllers\API\JurusanAPIController;
use App\Http\Controllers\API\KelasAPIController;
use App\Http\Controllers\API\MahasiswaAPIController;
use App\Http\Controllers\API\RuangAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ruang', [RuangAPIController::class, 'get_all'])->name('ruang.get');
Route::get('/jurusan', [JurusanAPIController::class, 'get_all'])->name('jurusan.get');
Route::get('/kelas', [KelasAPIController::class, 'get_all'])->name('kelas.get');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
