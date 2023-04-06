<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CopenController;
use App\Http\Controllers\Api\NotiController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ServiceController;

use App\Http\Controllers\Api\NotificationController;
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
    Route::any('otplogin', [AuthController::class, 'otplogin']);

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
    Route::get('send/mail', [AuthController::class, 'index']);
    Route::any('changepasworduser', [AuthController::class, 'changeuserpassword']);
    Route::any('forgetuserpassword', [AuthController::class, 'userforgetpassword']);
    Route::any('forgetchangepassword', [AuthController::class, 'forgetchange']);

    Route::any('balanceadd', [AccountController::class, 'add']);
    Route::any('balancesubtract', [AccountController::class, 'subtract']);
    Route::any('mobileotp', [AdminController::class, 'index']);
    Route::any('vendernotfion', [NotiController::class, 'get']);
    Route::any('usernotfion', [NotiController::class, 'getss']);
    Route::any('googlelogin', [AuthController::class, 'google']);
    Route::any('facebooklogin', [AuthController::class, 'facebook']);
    Route::any('userget', [AuthController::class, 'getuser']);
    Route::any('notificationdetail', [OrderController::class, 'notidetail']);
    Route::any('getcoupon', [CopenController::class, 'coupon']);
    Route::group(['middleware' => 'auth:api'], function () {
        Route::any('ordersave', [OrderController::class, 'order']);
        Route::any('balanceshow', [AccountController::class, 'show']);
        Route::any('check/userNotification',[NotiController::class, 'userCheck']);
    });
    Route::group(['middleware' => 'auth:vendor_api'], function () {
        Route::any('check/vendorNotification',[NotiController::class, 'check']);
    });
});
