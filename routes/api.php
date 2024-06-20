<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Developers;
use App\Models\Games;


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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request)  {
    return $request->user();
});
Route::get('/developers', function () {
    $developers = Developers::all();
    return $developers;
});
Route::get('/games', function () {
    $games = Games::all();
    return $games;
});
