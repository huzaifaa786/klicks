<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();

// });
Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {

    Route::any('register', [AuthController::class, 'register']);
    Route::any('login', [AuthController::class, 'login']);


    Route::any('city/all', [CityController::class, 'allCities']);
    Route::any('city/malls', [CityController::class, 'cityMalls']);
      Route::any('place/order', [OrderController::class, 'order']);

});
