<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MealController;
use App\Http\Controllers\Api\FileMealController;

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


  // These Route is Post request because we are storing the data of upcoming request
  Route::post('/login', [AuthController::class, 'login']);

Route::group( ['middleware' => 'api'], function () {

        // This Route is Post request because we are storing the data of upcoming request
        Route::post('/register', [AuthController::class, 'register']);

        Route::post('/logout', [AuthController::class, 'logout']);
        // These Route is get request because we are found the data of store request

        Route::get('/profile', [AuthController::class, 'profile']);

}

);
Route::apiResource('/meals', MealController::class);

Route::apiResource('/file_meals', FileMealController::class);
// Route::post('/meals', [MealController::class, 'store']);

