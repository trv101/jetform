<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('form', [FormController::class, 'index']);
Route::post('store-form', [FormController::class, 'store']);


Route::get('/form', [FormController::class, 'index'])->name('form');
