<?php

use App\Http\Controllers\OrmasController;
use App\Http\Controllers\UserAuthController;
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

Route::middleware('custom-auth')->group(function () {
    Route::post('/ormas', [OrmasController::class, 'register']);
    Route::put('/ormas/{id}', [OrmasController::class, 'update']);
    Route::delete('/ormas/{id}', [OrmasController::class, 'destroy']);
    Route::get('/ormas', [OrmasController::class,'index']);
});

Route::post('/user/register', [UserAuthController::class, 'register']);
Route::post('/user/login', [UserAuthController::class, 'login']);