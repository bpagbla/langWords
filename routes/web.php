<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WordController;

Route::resource('words', WordController::class);

Route::get('/', [WordController::class, 'index']);


Route::get('/words/{id}/edit', [WordController::class, 'edit'])->name('words.edit');
Route::put('/words/{id}', [WordController::class, 'update'])->name('words.update');