<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MedicinesController;
use \App\Http\Controllers\TagsController;

use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('/layout',function(){
    return view('layouts.main-layout');
})->name('layout');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/medicines/create', [MedicinesController::class, 'create'])->name('medicines.create');
    Route::get('/medicines/{medicine}/edit', [MedicinesController::class, 'edit'])->name('medicines.edit');
    Route::post('/medicines', [MedicinesController::class, 'store'])->name('medicines.store');
    Route::delete('/medicines/{medicine}', [MedicinesController::class, 'destroy'])->name('medicines.destroy');
    Route::put('/medicines/{medicine}', [MedicinesController::class,'update'])->name('medicines.update');

    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/{category}', [CategoriesController::class,'update'])->name('categories.update');

    Route::get('/tags/create', [TagsController::class, 'create'])->name('tags.create');
    Route::get('/tags/{category}/edit', [TagsController::class, 'edit'])->name('tags.edit');
    Route::post('/tags', [TagsController::class, 'store'])->name('tags.store');
    Route::delete('/tags/{category}', [TagsController::class, 'destroy'])->name('tags.destroy');
    Route::put('/tags/{category}', [TagsController::class,'update'])->name('tags.update');

});

require __DIR__.'/auth.php';

Route::get('/medicines', [MedicinesController::class, 'index'])->name('medicines.index');
Route::get('/medicines/{id}', [MedicinesController::class, 'show'])->name('medicines.show');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoriesController::class, 'show'])->name('categories.show');

Route::get('/tags', [TagsController::class, 'index'])->name('tags.index');
Route::get('/tags/{id}', [TagsController::class, 'show'])->name('tags.show');