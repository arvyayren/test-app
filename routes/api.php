<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/my_client', [App\Http\Controllers\MyClientController::class, 'index']);
Route::post('/my_client/create', [App\Http\Controllers\MyClientController::class, 'create']);
Route::post('/my_client/update', [App\Http\Controllers\MyClientController::class, 'update']);
Route::post('/my_client/delete', [App\Http\Controllers\MyClientController::class, 'delete']);