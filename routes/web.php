<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\StorageItemController;
use App\Models\Product;
use App\Models\ShoppingListItem;
use App\Models\StorageItem;

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

Route::resource('products', ProductController::class)->only(['index', 'review', 'add-or-update'])->middleware(['auth','verified']);
Route::post('/products/review', [ProductController::class, 'reviewSelection'])->name('products.review')->middleware(['auth','verified']);
Route::patch('/products/review', [ProductController::class, 'addOrUpdateProducts'])->name('products.add-or-update')->middleware(['auth','verified']);

Route::resource('recipes', RecipeController::class)->only(['index', 'show'])->middleware(['auth','verified']);
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show') ->middleware(['auth','verified']);
Route::patch('/recipes/{id}', [RecipeController::class, 'store'])->name('recipes.store')->middleware(['auth','verified']);

Route::resource('shoppinglists', ShoppingListController::class)->only(['index', 'show', 'add-or-update'])->middleware(['auth','verified']);
Route::get('/shoppinglists/{id}', [ShoppingListController::class, 'show'])->middleware(['auth','verified']);
Route::patch('/shoppinglists/{id}', [ShoppingListController::class, 'storeToStorage'])->name('shoppinglists.add-or-update')->middleware(['auth','verified']);

Route::get('/recepies/{id}', [RecipeController::class, 'show'])->name('recepies.show');

Route::resource('storage', StorageItemController::class)->only(['index', 'edit'])->middleware(['auth','verified']);
Route::post('/storage/review', [StorageItemController::class, 'editSelection'])->name('storage.review')->middleware(['auth','verified']);
Route::patch('storage/review', [StorageItemController::class, 'update'])->name('storage.update')->middleware(['auth','verified']);



require __DIR__.'/auth.php';