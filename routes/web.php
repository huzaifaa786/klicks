<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MallController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('admin/das','Admin.layout')->name('login.lo');
Route::view('admin/login','Admin.login')->name('admin/login');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin/logout');
// //////////////////////admin///////////
// Route::post('admine/dashboard', 'App\Http\Controllers\AdminController@postLogin')->name('admine-login');
Route::post('admin/postlogin', [AdminController::class, 'login'])->name('admin-login');
Route::group(['middleware' => ['auth:admin']], function(){
Route::view('admin/layout','admin.layout')->name('admin/layout');
Route::view('admin/city/create','Admin.city.create')->name('admin/city');
Route::post('admin/add/city', [CityController::class, 'store'])->name('admine-city');
Route::view('admin/mall/create','Admin.Mall.create')->name('admin/mall');
Route::get('admin/show/city', [CityController::class, 'show'])->name('show-city');
Route::post('admin/save/city', [MallController::class, 'store'])->name('save-mall');
Route::get('admin/show/mall', [MallController::class, 'show'])->name('show-mall');
Route::get('admin/mall', [MallController::class, 'shows'])->name('all-mall');
Route::post('admin/add/company', [CompanyController::class, 'store'])->name('admine-company');
Route::get('admin/all/company', [CompanyController::class, 'show'])->name('all-company');
Route::get('admin/all/city', [CityController::class, 'shows'])->name('all-city');
Route::get('admin/delete/company/{id}', [CompanyController::class, 'delete'])->name('delete/company');
Route::get('admin/delete/mall/{id}', [MallController::class, 'delete'])->name('delete/mall');
Route::get('admin/delete/city/{id}', [CityController::class, 'delete'])->name('delete/city');
Route::post('admin/edit/city/{id}', [CityController::class, 'update'])->name('edit-city');
Route::post('admin/edit/mall/{id}', [MallController::class, 'update'])->name('edit-mall');
Route::post('admin/edit/company/{id}', [CompanyController::class, 'update'])->name('edit-company');
Route::view('admin/dashboard','Admin.dashboard')->name('login.dashboard');
Route::get('admin/orders/detail/{id}',[OrderController::class, 'details']);
//////////////////
Route::get('admin/city', [CityController::class, 'showss'])->name('all/city');
Route::post('mall/city', [MallController::class, 'showss'])->name('mall/city');
Route::post('company/city', [CompanyController::class, 'showss'])->name('company/city');
Route::post('admin/save/vendor', [VendorController::class, 'store'])->name('save/vendor');
Route::view('admin/view/vendor','Admin.vendor.create')->name('admin/vendor');
Route::get('admin/order', [OrderController::class, 'shows'])->name('all-order');
});
Route::get('send/mail', [AuthController::class, 'index']);
