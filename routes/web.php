<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SpeciesController;

// para la gestión de animales

Route::get('/', function () {
    return view('welcome');
});

Route::get('/animales', [AnimalController::class, 'index'])
    ->name('animales.index');

Route::get('/animales/create', [AnimalController::class, 'create'])
    ->name('animales.create');

Route::post('/animales', [AnimalController::class, 'store'])
    ->name('animales.store');

Route::get('/animales/{id}/edit', [AnimalController::class, 'edit'])
    ->name('animales.edit');

Route::put('/animales/{id}', [AnimalController::class, 'update'])
    ->name('animales.update');

Route::delete('/animales/{id}', [AnimalController::class, 'destroy'])
    ->name('animales.destroy');


// para la gestión de especies

Route::get('/species', [SpeciesController::class, 'index'])->name('species.index');

Route::get('/species/create', [SpeciesController::class, 'create'])->name('species.create');

Route::post('/species', [SpeciesController::class, 'store'])->name('species.store');

Route::get('/species/{id}/edit', [SpeciesController::class, 'edit'])->name('species.edit');

Route::put('/species/{id}', [SpeciesController::class, 'update'])->name('species.update');

Route::delete('/species/{id}', [SpeciesController::class, 'destroy'])->name('species.destroy');
