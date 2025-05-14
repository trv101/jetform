<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('form', [FormController::class, 'index']);
Route::post('store-form', [FormController::class, 'store']);


Route::get('/form', [FormController::class, 'index'])->name('form');

Route::view('/pricing', 'pages.pricing')->name('pricing');
Route::view('/support', 'pages.support')->name('support');

Route::post('/support/email', [SupportController::class, 'send'])->name('support.email');


