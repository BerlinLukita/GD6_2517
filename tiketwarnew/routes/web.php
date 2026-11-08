<?php

use App\Http\Controllers\KonserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotorController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/tentang', 'about')->name('tentang');
Route::view('/kontak', 'kontak')->name('kontak');

Route::get('/konser', [KonserController::class, 'index'])
    ->name('konser.index');

Route::get('/konser/create', [KonserController::class, 'create'])
    ->name('konser.create'); // BARU

Route::post('/konser', [KonserController::class, 'store'])
    ->name('konser.store'); // BARU

Route::get('/konser/{id}', [KonserController::class, 'show'])
    ->whereNumber('id')
    ->name('konser.detail');
    
Route::get('/konser/{id}/edit', [KonserController::class, 'edit'])
    ->whereNumber('id')->name('konser.edit');

Route::put('/konser/{id}', [KonserController::class, 'update'])
    ->whereNumber('id')->name('konser.update');

Route::delete('/konser/{id}', [KonserController::class, 'destroy'])
    ->whereNumber('id')->name('konser.destroy');

    
// CRUD Promotor
Route::get('/promotor', [PromotorController::class, 'index'])
    ->name('promotor.index');

Route::get('/promotor/create', [PromotorController::class, 'create'])
    ->name('promotor.create');

Route::post('/promotor', [PromotorController::class, 'store'])
    ->name('promotor.store');

Route::get('/promotor/{id}/edit', [PromotorController::class, 'edit'])
    ->whereNumber('id')->name('promotor.edit');

Route::put('/promotor/{id}', [PromotorController::class, 'update'])
    ->whereNumber('id')->name('promotor.update');

Route::delete('/promotor/{id}', [PromotorController::class, 'destroy'])
    ->whereNumber('id')->name('promotor.destroy');
