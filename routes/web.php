<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingListController;

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

Route::resource('products', ProductController::class)->only(['index'])->middleware(['auth','verified']);

Route::resource('recipes', RecipeController::class)->only(['index'])->middleware(['auth','verified']);

Route::resource('shoppinglists', ShoppingListController::class)->only(['index', 'show'])->middleware(['auth','verified']);
Route::get('/shoppinglists/{id}', [ShoppingListController::class, 'show']);

Route::get('/recepies/{id}', [RecipeController::class, 'show'])->name('recepies.show');


require __DIR__.'/auth.php';