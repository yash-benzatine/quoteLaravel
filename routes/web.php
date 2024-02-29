<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ThemesController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FavouriteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Show all categories
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');

// Show the form for creating a new category
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');

// Store a newly created category in the database
Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');

// Display the specified category
Route::get('/categories/{category}', [CategoriesController::class, 'show'])->name('categories.show');

// Show the form for editing the specified category
Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');

// Update the specified category in the database
Route::post('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');

// Remove the specified category from the database
Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/themes', [ThemesController::class, 'index'])->name('themes.index');
Route::get('/themes/create', [ThemesController::class, 'create'])->name('themes.create');
Route::post('/themes', [ThemesController::class, 'store'])->name('themes.store');
Route::get('/themes/{theme}', [ThemesController::class, 'show'])->name('themes.show');
Route::get('/themes/{theme}/edit', [ThemesController::class, 'edit'])->name('themes.edit');
Route::post('/themes/{theme}', [ThemesController::class, 'update'])->name('themes.update');
Route::delete('/themes/{theme}', [ThemesController::class, 'destroy'])->name('themes.destroy');

Route::get('/quotes', [QuotesController::class, 'index'])->name('quotes.index');
Route::get('/quotes/create', [QuotesController::class, 'create'])->name('quotes.create');
Route::post('/quotes', [QuotesController::class, 'store'])->name('quotes.store');
Route::get('/quotes/{quote}', [QuotesController::class, 'show'])->name('quotes.show');
Route::get('/quotes/{quote}/edit', [QuotesController::class, 'edit'])->name('quotes.edit');
Route::post('/quotes/{quote}', [QuotesController::class, 'update'])->name('quotes.update');
Route::delete('/quotes/{quote}', [QuotesController::class, 'destroy'])->name('quotes.destroy');

Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites.index');

Auth::routes();
