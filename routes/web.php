<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormBuilderController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:Admin|Super-Admin','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::view('/myWorkspace', 'pages.myWorkspace')->name('myWorkspace');
    // Route::view('/builder', 'form.builder')->name('form-builder');
    //should delete this route
    // Route::get('/form-builder', [FormController::class, 'builder'])->name('form.builder');
    //
    Route::get('/builder/{form}', [FormBuilderController::class, 'edit'])->name('form.builder');
    Route::put('/builder/{form}', [FormBuilderController::class, 'update'])->name('form.update');
    Route::post('/forms/create', [FormController::class, 'store'])->name('forms.store');
  
});


Route::middleware('role:Admin|Super-Admin')->group(function () {
    Route::resource("users", UserController::class);
    Route::resource("roles", RoleController::class);
});




Route::view('/pricing', 'pages.pricing')->name('pricing');
Route::view('/support', 'pages.support')->name('support');

Route::post('/support/email', [SupportController::class, 'send'])->name('support.email');


require __DIR__.'/auth.php';