<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [ApiController::class, 'login']);
Route::post('/logout', [ApiController::class, 'logout']);
Route::post('/deleteUser', [ApiController::class, 'deleteUser']);
Route::get('/getCategory', [ApiController::class, 'getCategory']);
Route::get('/getThemes', [ApiController::class, 'getThemes']);
Route::post('/getQuotes', [ApiController::class, 'getQuotes']);
Route::post('/favouriteQuote', [ApiController::class, 'favouriteQuote']);
Route::post('/getFavouriteQuote', [ApiController::class, 'getFavouriteQuote']);
