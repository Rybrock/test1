<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GameController;
use App\Models\Developer;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// developer routes
Route::get('developers', [DeveloperController::class, 'index']);
Route::post('developers', [DeveloperController::class, 'store']);
Route::get('developers/{id}', [DeveloperController::class, 'show']);
Route::put('developers/{id}', [DeveloperController::class, 'update']);
Route::delete('developers/{id}', [DeveloperController::class, 'destroy']);
// game routes
Route::get('games', [GameController::class, 'index']);
Route::post('games', [GameController::class, 'store']);
Route::get('games/{id}', [GameController::class, 'show']);
Route::put('games/{id}', [GameController::class, 'update']);
Route::delete('games/{id}', [GameController::class, 'destroy']);
