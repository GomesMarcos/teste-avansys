<?php

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

Route::get('status/', [App\Http\Controllers\StatusController::class, 'index']);

Route::get('operadoras/', [App\Http\Controllers\OperadoraController::class, 'index']);
Route::post('operadoras/nova', [App\Http\Controllers\OperadoraController::class, 'store']);
Route::put('operadoras/{id}/atualizar', [App\Http\Controllers\OperadoraController::class, 'update']);
Route::delete('operadoras/{id}/deletar', [App\Http\Controllers\OperadoraController::class, 'destroy']);
