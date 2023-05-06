<?php

use App\Http\Controllers\VisiteurController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('visiteur', [VisiteurController::class, 'index']);
Route::post('visiteur', [VisiteurController::class, 'create']);
Route::get('visiteur/{id}', [VisiteurController::class, 'show']);
Route::put('visiteur/{id}/edit', [VisiteurController::class, 'update']);
Route::delete('visiteur/{id}/delete', [VisiteurController::class, 'destroy']);
