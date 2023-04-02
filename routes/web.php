<?php

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

Route::get('/', function () {
    return view('admin/pages/login');
});
Route::get('/lock', function () {
    return view('admin/pages/lock');
});

Route::get('/forgot-password', function () {
    return view('admin/pages/forgot-password');
});

Route::get('/home', function () {
    return view('admin/pages/home');
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

// Salesman
Route::get('/salesman', function () {
    return view('admin/pages/salesman/salesman');
});

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

Route::get('/sellers', function () {
    return view('admin/pages/sellers/sellers');
});

Route::get('/packages', function () {
    return view('admin/pages/premium/packages');
});
Route::get('/banners', function () {
    return view('admin/pages/premium/banners');
});
Route::get('/offer-categories', function () {
    return view('admin/pages/offers/categories');
});
Route::get('/offers', function () {
    return view('admin/pages/offers/offer');
});

Route::get('/settings', function () {
    return view('admin/pages/settings');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
