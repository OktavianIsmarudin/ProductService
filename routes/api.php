<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserConsumerController;

Route::apiResource('produks', ProdukController::class);
Route::get('/cek-siswa/{id}', [UserConsumerController::class, 'getSiswa']);

