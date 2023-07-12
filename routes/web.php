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
Route::get('/salesman/delete/{id}', [SalesManController::class,'destroy'])->name('delete.salesman');

Route::resource('/seller-management', SellerController::class);
Route::get('/seller/delete/{id}', [SellerController::class,'destroy'])->name('delete.seller');
Route::resource('/offer-categories', CategoryController::class);
Route::get('/category/delete/{id}', [CategoryController::class,'destroy'])->name('delete.category');

Route::resource('/offer-sub-categories', SubCatogoryController::class);
Route::get('/sub-category/delete/{id}', [SubCatogoryController::class,'destroy'])->name('delete.subcategory');

Route::resource('/offer-management', PostController::class);
Route::get('/offer/delete/{id}', [PostController::class,'destroy'])->name('delete.offer');


Route::resource('/visitor-management', CustomerController::class);
Route::get('/visitor/delete/{id}', [CustomerController::class,'destroy'])->name('delete.visitor');

Route::resource('/area-management', AreaController::class);
Route::get('/area/delete/{id}', [AreaController::class,'destroy'])->name('delete.area');

Route::resource('/city-management', CityController::class);
Route::get('/city/delete/{id}', [CityController::class,'destroy'])->name('delete.city');

Route::resource('/province-management', ProvinceController::class);
Route::get('/province/delete/{id}', [ProvinceController::class,'destroy'])->name('delete.province');

Route::get('/seller/change-status/{status}/{id}', [SellerController::class, 'change_status'])->name('admin.seller.status');




// Seller

