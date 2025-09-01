<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicineController;
use \App\Http\Controllers\TagController;

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

    Route::get('/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
    Route::get('/medicines/{medicine}/edit', [MedicineController::class, 'edit'])->name('medicines.edit');
    Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');
    Route::delete('/medicines/{medicine}', [MedicineController::class, 'destroy'])->name('medicines.destroy');
    Route::put('/medicines/{medicine}', [MedicineController::class,'update'])->name('medicines.update');

    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/{category}', [CategoryController::class,'update'])->name('categories.update');

    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::get('/tags/{category}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::delete('/tags/{category}', [TagController::class, 'destroy'])->name('tags.destroy');
    Route::put('/tags/{category}', [TagController::class,'update'])->name('tags.update');

});

require __DIR__.'/auth.php';

Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
Route::get('/medicines/{id}', [MedicineController::class, 'show'])->name('medicines.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/{id}', [TagController::class, 'show'])->name('tags.show');