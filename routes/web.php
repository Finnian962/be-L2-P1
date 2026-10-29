<?php

use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/magazijn', [MagazijnController::class, 'index'])->name('magazijn.index');
    Route::get('/magazijn/{magazijn}/leveringen', [MagazijnController::class, 'leveringen'])->name('magazijn.leveringen');
    Route::get('/magazijn/{magazijn}/allergenen', [MagazijnController::class, 'allergenen'])->name('magazijn.allergenen');

    // User story 01: Overzicht leveranciers
    Route::get('/leveranciers', [LeverancierController::class, 'index'])->name('leveranciers.index');
    Route::get('/leveranciers/{leverancier}/producten', [LeverancierController::class, 'producten'])->name('leveranciers.producten');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';