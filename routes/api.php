<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\DeveloperGameController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SubscriberController;
use App\Mail\SubscriberEmail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


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
Route::post('developers/{id}', [DeveloperController::class, 'update']);
Route::delete('developers/{id}', [DeveloperController::class, 'destroy']);

// developer game routes
Route::get('developers/{developer_id}/games', [DeveloperGameController::class, 'index']);
Route::post('developers/{developer_id}/games', [DeveloperGameController::class, 'store']);
Route::get('developers/{developer_id}/games/{game_id}', [DeveloperGameController::class, 'show']);
Route::put('developers/{developer_id}/games/{game_id}', [DeveloperGameController::class, 'update']);
Route::delete('developers/{developer_id}/games/{game_id}', [DeveloperGameController::class, 'destroy']);

// game routes
// Route::get('games', [GameController::class, 'index']);
// Route::post('games', [GameController::class, 'store']);
// Route::get('games/{id}', [GameController::class, 'show']);
// Route::post('games/{id}', [GameController::class, 'update']);
// Route::delete('games/{id}', [GameController::class, 'destroy']);

// subscriber routes
Route::get('subscribers', [SubscriberController::class, 'index']);
Route::post('subscribers', [SubscriberController::class, 'store']);
Route::get('subscribers/{id}', [SubscriberController::class, 'show']);
Route::put('subscribers/{id}', [SubscriberController::class, 'update']);
Route::delete('subscribers/{id}', [SubscriberController::class, 'destroy']);
Route::post('subscribers/{id}/games', [SubscriberController::class, 'addGames']);
Route::delete('subscribers/{id}/games/{game_id}', [SubscriberController::class, 'removeGame']);

// test route for sending an email
Route::get('/test-email', function () {
    Mail::to('ryan.brockley@stoneacre.co.uk')->send(new SubscriberEmail('Test User'));
    return 'Test email sent!';
});
