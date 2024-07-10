<?php

use App\Http\Controllers\API\RuangAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ruang', [RuangAPIController::class, 'get_all'])->name('ruang.get');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
