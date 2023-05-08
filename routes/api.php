<?php

use App\Http\Controllers\Api\BasketController;
use App\Http\Controllers\Api\DeskController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\OpenController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/price', [DeskController::class, 'index']);
Route::get('/price/discount', [DeskController::class, 'discount']);
Route::get('/price/{id}', [DeskController::class, 'show']);
Route::post('/price/filter', [DeskController::class, 'filter']);
Route::post('/price', [DeskController::class, 'sends']);
Route::delete('/price/delete/{id}', [DeskController::class, 'delete']);
Route::post('/price/update', [DeskController::class, 'update']);
Route::post('/reg', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'signup']);
Route::get('/pay/{id}/open', [OpenController::class, 'index']);
Route::get('/basket', [BasketController::class, 'index']);
Route::post('/basket', [BasketController::class, 'add']);
Route::delete('/basket/{id}', [BasketController::class, 'delete']);