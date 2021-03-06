<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\bannerController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\colorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\productController;
use App\Http\Controllers\sizeController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/',[frontendController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//=========facebook login=============//
Route::get('/login/facebook', [LoginController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [LoginController::class,'handleFacebookCallback']);


//=========google login=============//
Route::get('/login/google', [LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class,'handleGoogleCallback']);
//==========CATEGORY==========//
route::get('category',[categoryController::class,'index'])->name('category');
route::get('add/category',[categoryController::class,'addCategory'])->name('add.category');
route::post('insert/category',[categoryController::class,'insertCategory'])->name('insert.category');
route::get('edit/category/{id}',[categoryController::class,'editCategory']);
route::post('update/category/{id}',[categoryController::class,'updateCategory']);
route::get('delete/category/{id}',[categoryController::class,'deleteCategory']);
route::get('inactive/category/{id}',[categoryController::class,'inactiveCategory']);
route::get('active/category/{id}',[categoryController::class,'activeCategory']);

//==========COUPON==========//
route::get('coupon',[couponController::class,'index'])->name('coupon');
route::get('add/coupon',[couponController::class,'addCoupon'])->name('add.coupon');
route::post('insert/coupon',[couponController::class,'insertCoupon'])->name('insert.coupon');
route::get('edit/coupon/{id}',[couponController::class,'editCoupon']);
route::post('update/coupon/{id}',[couponController::class,'updateCoupon']);
route::get('delete/coupon/{id}',[couponController::class,'deleteCoupon']);
route::get('inactive/coupon/{id}',[couponController::class,'inactiveCoupon']);
route::get('active/coupon/{id}',[couponController::class,'activeCoupon']);

//==========SIZE==========//
route::get('size',[sizeController::class,'index'])->name('size');
route::get('add/size',[sizeController::class,'addSize'])->name('add.size');
route::post('insert/size',[sizeController::class,'insertSize'])->name('insert.size');
route::get('edit/size/{id}',[sizeController::class,'editSize']);
route::post('update/size/{id}',[sizeController::class,'updateSize']);
route::get('delete/size/{id}',[sizeController::class,'deleteSize']);
route::get('inactive/size/{id}',[sizeController::class,'inactiveSize']);
route::get('active/size/{id}',[sizeController::class,'activeSize']);

//==========COLOR==========//
route::get('color',[colorController::class,'index'])->name('color');
route::get('add/color',[colorController::class,'addColor'])->name('add.color');
route::post('insert/color',[colorController::class,'insertColor'])->name('insert.color');
route::get('edit/color/{id}',[colorController::class,'editColor']);
route::post('update/color/{id}',[colorController::class,'updateColor']);
route::get('delete/color/{id}',[colorController::class,'deleteColor']);
route::get('inactive/color/{id}',[colorController::class,'inactiveColor']);
route::get('active/color/{id}',[colorController::class,'activeColor']);

//==========BRAND==========//
route::get('brand',[brandController::class,'index'])->name('brand');
route::get('add/brand',[brandController::class,'addBrand'])->name('add.brand');
route::post('insert/brand',[brandController::class,'insertBrand'])->name('insert.brand');
route::get('edit/brand/{id}',[brandController::class,'editBrand']);
route::post('update/brand/{id}',[brandController::class,'updateBrand']);
route::get('delete/brand/{id}',[brandController::class,'deleteBrand']);
route::get('inactive/brand/{id}',[brandController::class,'inactiveBrand']);
route::get('active/brand/{id}',[brandController::class,'activeBrand']);

//===========PRODUCT===========//
route::get('product',[productController::class,'index'])->name('product');
route::get('show/product',[productController::class,'showProduct'])->name('show.product');
route::post('insert/product',[productController::class,'insertProduct'])->name('insert.product');
route::get('edit/product/{id}',[productController::class,'editProduct']);
route::post('update/product/content/{id}',[productController::class,'updateProduct']);
route::post('update/image/{id}',[productController::class,'updateImage']);
route::get('delete/product/{id}',[productController::class,'deleteProduct']);
route::get('inactive/product/{id}',[productController::class,'inactiveProduct']);
route::get('active/product/{id}',[productController::class,'activeProduct']);

//===========CUSTOMER===========//
route::get('customer',[customerController::class,'index'])->name('customer');
route::get('view/customer/{id}',[customerController::class,'viewCustomer']);
route::get('inactive/customer/{id}',[customerController::class,'inactiveCustomer']);
route::get('active/customer/{id}',[customerController::class,'activeCustomer']);

//=============BANNER==============//
route::get('banner',[bannerController::class,'index'])->name('banner');
route::get('add/banner',[bannerController::class,'addBanner'])->name('add.banner');
route::post('insert/banner',[bannerController::class,'insertBanner'])->name('insert.banner');
route::get('edit/banner/{id}',[bannerController::class,'editBanner']);
route::post('update/banner/{id}',[bannerController::class,'updateBanner']);
route::get('delete/banner/{id}',[bannerController::class,'deleteBanner']);
route::get('inactive/banner/{id}',[bannerController::class,'inactiveBanner']);
route::get('active/banner/{id}',[bannerController::class,'activeBanner']);
