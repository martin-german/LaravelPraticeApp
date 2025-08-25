<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MedicinesController;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('/layout',function(){
    return view('layout');
})->name('layout');


Route::resource('categories', CategoriesController::class);
Route::resource('medicines', MedicinesController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
