<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExplorerController;
use App\Http\Controllers\ItemController;


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

Route::post('/exploradores', [ExplorerController::class, 'store']);
Route::patch('/exploradores/{id}', [ExplorerController::class, 'updateLocation']);
Route::get('/exploradores/{id}', [ExplorerController::class, 'show']);
Route::post('/exploradores/{id}/inventario', [ItemController::class, 'store']);
Route::post('/exploradores/trocar', [ItemController::class, 'trade']);
Route::get('/exploradores/{id}/historico', [ExplorerController::class, 'getLocationHistory']);
