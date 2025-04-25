<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukUIController;

Route::get('/', [ProdukUIController::class, 'index']);
Route::get('/produks', [ProdukUIController::class, 'listProduk']);
Route::post('/produks', [ProdukUIController::class, 'storeProduk']);

