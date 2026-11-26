<?php

use App\Http\Controllers\Api\KonserController; 
use App\Http\Controllers\Api\PesananController; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/konser', [KonserController::class, 'index']) 
    ->name('api.konser.index'); 
Route::get('/konser/{konser}', [KonserController::class, 'show']) 
    ->whereNumber('konser')->name('api.konser.show'); 
Route::post('/konser/{konser}/pesanan', [PesananController::class, 'store']) 
    ->whereNumber('konser')->name('api.pesanan.store'); 