<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ServiceController;
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
    Route::any('companyLogin', [AuthController::class, 'companylogin']);

    Route::any('city/all', [CityController::class, 'allCities']);
    Route::any('city/malls', [CityController::class, 'cityMalls']);
      Route::any('place/order', [OrderController::class, 'order']);
      Route::any('addservice', [ServiceController::class, 'store']);
      Route::any('allservices', [ServiceController::class, 'show']);
      Route::any('companyget', [ServiceController::class, 'get']);
      Route::any('getuser', [AuthController::class, 'get']);
      Route::any('delservice', [ServiceController::class, 'del']);
      Route::any('editservice', [ServiceController::class, 'edit']);
      Route::any('mall/companys', [CityController::class, 'Mallcompany']);
      Route::any('ordersave', [OrderController::class, 'order']);
      Route::any('vendororder', [OrderController::class, 'vendor']);
      Route::any('orderdetail', [OrderController::class, 'detail']);
      Route::any('changepasword', [AuthController::class, 'change']);
      Route::any('forgetpasword', [AuthController::class, 'forget']);
      Route::any('orderaccept', [OrderController::class, 'accept']);
      Route::any('orderreject', [OrderController::class, 'reject']);
      Route::any('ordercomplete', [OrderController::class, 'complete']);
      Route::any('saleorder', [OrderController::class, 'saleorder']);
      Route::any('changeprice', [ServiceController::class, 'changeprice']);
      Route::any('forget', [AuthController::class, 'forgetpassword']);
      Route::any('totalsale', [OrderController::class, 'saleofmonth']);
      Route::any('createpaymentIntent', [PaymentController::class, 'createPaymentIntent']);
      Route::any('getuserorder', [OrderController::class, 'userorder']);
});
