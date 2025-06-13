<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukUIController;

Route::get('/', [ProdukUIController::class, 'index']);
Route::get('/produks', [ProdukUIController::class, 'listProduk']);
Route::post('/produks', [ProdukUIController::class, 'storeProduk']);
Route::get('/produks/edit/{id}', [ProdukUIController::class, 'editProduk'])->name('produks.edit');
Route::put('/produks/update_produk', [ProdukUIController::class, 'updateProduk'])->name('produks.update');
Route::delete('/produks/{id}', [ProdukUIController::class, 'destroyProduk'])->name('produks.destroy');
Route::post('/produks/{id}/reduce-stock', [ProdukUIController::class, 'reduceStock']);

