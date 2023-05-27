<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SalesManController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCatogoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AreaController;


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
Route::post('seller/update',[SellerController::class, 'Apistore']);
Route::get('salesman/list',[SalesManController::class, 'sales_man_list']);
Route::get('subcategory',[SubCatogoryController::class, 'subcategoryApi']);
Route::get('category',[CategoryController::class, 'categoryApi']);

Route::get('city',[CityController::class, 'cityApi']);
Route::get('area',[AreaController::class, 'areaApi']);
Route::controller(AuthController::class)->group(function () {
    Route::post('seller/login', 'seller_login');
    Route::post('cutomer/login', 'customer_login');
    Route::post('salesman/login', 'salesman_login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});
Route::middleware(['seller'])->group(function () {

    Route::post('create/shop',[ShopController::class, 'create_shop_api']);
    Route::get('list/shop',[ShopController::class, 'shop_list']);
    Route::post('create/offer',[PostController::class, 'create_offer_api']);
});
