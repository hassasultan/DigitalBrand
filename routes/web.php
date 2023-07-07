<?php

use App\Http\Controllers\SalesManController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCatogoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CityController;
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
    return view('admin/pages/login');
});

Route::get('/lock', function () {
    return view('admin/pages/lock');
});

Route::get('/settings', function () {
    return view('admin/pages/settings');
});

Route::get('/forgot-password', function () {
    return view('admin/pages/forgot-password');
});

// Users & User Role
Route::get('/users', function () {
    return view('admin/pages/users/users');
});
Route::get('/user/form', function () {
    return view('admin/pages/users/user_form');
});

Route::get('/user_roles', function () {
    return view('admin/pages/users/user_roles');
});
Route::get('/user_role/form', function () {
    return view('admin/pages/users/user_role_form');
});

// Route::get('/home', function () {
//     return view('admin/pages/home');
// });

Route::get('/salesman/form', function () {
    return view('admin/pages/salesman/salesman_form');
});

// Visitors
Route::get('/visitors', function () {
    return view('admin/pages/visitors/visitors');
});

Route::get('/visitor/form', function () {
    return view('admin/pages/visitors/visitor_form');
});

// Sellers

// Route::get('/sellers', function () {
//     return view('admin/pages/sellers/sellers');
// });

// Route::get('/seller/form', function () {
//     return view('admin/pages/sellers/create');
// });

// Seller Shops
 Route::get('/seller-shops', function () {
     return view('admin/pages/sellers/seller-shops/index');
 });

 Route::get('/seller-shops/form', function () {
     return view('admin/pages/sellers/seller-shops/create');
 });

// -- Offers -- //

// categories


// offers

Route::get('/offers/form', function () {
    return view('admin/pages/offers/offers/create');
});

Route::get('/offers', function () {
    return view('admin/pages/offers/offers/index');
});

// feedback
Route::get('/feedback', function () {
    return view('admin/pages/feedbacks/index');
});

// -- Premium -- //

// Packages
Route::get('/packages', function () {
    return view('admin/pages/premium/packages/index');
});
Route::get('/packages/form', function () {
    return view('admin/pages/premium/packages/create');
});
// Location

// Provinces
//  Route::get('/provinces', function () {
//      return view('admin/pages/locations/Provinces/index');
//  });

//  Route::get('/provinces/form', function () {
//      return view('admin/pages/locations/Provinces/create');
//  });

// Cities
// Route::get('/cities', function () {
//     return view('admin/pages/locations/Cities/index');
// });

// Route::get('/cities/form', function () {
//     return view('admin/pages/locations/Cities/create');
// });

// Area

// Route::get('/areas', function () {
//     return view('admin/pages/locations/Areas/index');
// });

// Route::get('/areas/form', function () {
//     return view('admin/pages/locations/Areas/create');
// });

// banners
Route::get('/banners', function () {
    return view('admin/pages/premium/banners/index');
});

Route::get('/banners/form', function () {
    return view('admin/pages/premium/banners/create');
});

// Tutorials
Route::get('/seller-guide', function () {
    return view('admin/pages/tutorials/seller-guide/index');
});

Route::get('/seller-guide/form', function () {
    return view('admin/pages/tutorials/seller-guide/create');
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Salesman
Route::resource('/salesman-management', SalesManController::class);
Route::resource('/seller-management', SellerController::class);
Route::resource('/offer-categories', CategoryController::class);
Route::resource('/offer-sub-categories', SubCatogoryController::class);
Route::resource('/offer-management', PostController::class);
Route::resource('/visitor-management', CustomerController::class);
Route::resource('/area-management', AreaController::class);
Route::resource('/city-management', CityController::class);
Route::resource('/province-management', ProvinceController::class);

Route::get('/seller/change-status/{status}/{id}', [SellerController::class, 'change_status'])->name('admin.seller.status');




// Seller

