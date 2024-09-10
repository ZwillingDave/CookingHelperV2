<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::get('/user', function () {
    return view('user');
})->middleware(['auth'])->name('user');

route::get('/products', function () {
    return view('products');
})->middleware(['auth',])->name('products');

route::get('/recepies/{id}', [RecipeController::class, 'show'])->name('recepies.show');


require __DIR__.'/auth.php';
