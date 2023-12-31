<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index']);
Route::post('/user/login', [UserController::class, 'login']);
Route::post('/user/register', [UserController::class, 'create']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/user/get', [UserController::class, 'user']);
    Route::get('/check-token', [UserController::class, 'check_token']);

    Route::post('/profile/update-avatar', [ProfileController::class, 'update_avatar']);
    Route::post('/profile/update-profile', [ProfileController::class, 'update_profile']);
    Route::get('/u/{url}', [ProfileController::class, 'index']);
});
