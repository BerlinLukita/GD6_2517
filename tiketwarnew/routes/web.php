
<?php

use App\Http\Controllers\KonserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/tentang', 'about')->name('tentang');


Route::get('/konser', [KonserController::class, 'index'])
    ->name('konser.index');

Route::get('/konser/{id}', [KonserController::class, 'show'])
    ->whereNumber('id')
    ->name('konser.detail');
