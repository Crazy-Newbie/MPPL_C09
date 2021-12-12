<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderdetailController;





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

// Route::get('/wishlist', function () {
//     return view('wishlist');
// })->name('wishlist');

Route::get('/',[ProductController::class,'landingpage'])->name('landing');

// Route::get('/landing',[ProductController::class,'landingpage'])->name('landing');


Route::get('/signup',[UserController::class,'signuppage'])->name('signup');
Route::post('/signup/post',[UserController::class,'signup'])->name('signup.post');

Route::get('/signin',[UserController::class,'signinpage'])->name('signin');
Route::post('/signin/post',[UserController::class,'signin'])->name('signin.post');

Route::post('/signout/post',[UserController::class,'signout'])->name('signout.post');

Route::get('/caribarang',[ProductController::class,'listproducts'])->name('caribarang');

Route::get('/detailbarang/{id}',[ProductController::class,'detailpage'])->name('detailbarang');
Route::get('/track',[OrderdetailController::class,'trackingpage'])->name('track');
Route::get('/history',[OrderdetailController::class,'historypage'])->name('history');


Route::get('/admin',[OrderdetailController::class,'adminpage'])->name('admin');
Route::get('/profile',[UserController::class,'profilepage'])->name('profile');

Route::get('/editprofile',[UserController::class,'editprofilepage'])->name('editprofile');
Route::post('/editprofile/post',[UserController::class,'editprofile'])->name('editprofile.post');

Route::get('/additem',[ProductController::class,'addpage'])->name('additem');
Route::post('/additem/post',[ProductController::class,'store'])->name('additem.post');

Route::get('/edititem/{id}',[ProductController::class,'editpage'])->name('edititem');
Route::get('/editdetail/{id}',[ProductController::class,'editdetail'])->name('editdetail');
Route::post('/edititem/post',[ProductController::class,'edititem'])->name('edititem.post');
Route::post('/formdetail/post',[ProductController::class,'formdetail'])->name('formdetail.post');

Route::get('/updatestatus',[OrderdetailController::class,'updatestatuspage'])->name('updatestatus');
Route::post('/updatestatus/post',[OrderdetailController::class,'updatestatus'])->name('updatestatus.post');


Route::resource('products', 'App\Http\Controllers\ProductController'); 

Route::get('product/{filename}', [FileController::class,'publicImage'])->name('images.displayImage');

Route::get('/cart',[CartController::class,'cartpage'])->name('cartpage');

Route::post('/addcart/post',[CartController::class,'addcart'])->name('addcart.post');
Route::post('/deletecart/post',[CartController::class,'deletecart'])->name('deletecart.post');
Route::post('/updateprice/post',[CartController::class,'updateprice'])->name('updateprice.post');
Route::post('/addamount/post',[CartController::class,'addamount'])->name('addamount.post');
Route::post('/minamount/post',[CartController::class,'minamount'])->name('minamount.post');


Route::get('/checkout',[OrderdetailController::class,'formpage'])->name('checkout');
Route::get('/payment',[OrderdetailController::class,'paymentpage'])->name('payment');

Route::post('/fillform/post',[OrderdetailController::class,'fillform'])->name('fillform.post');
Route::post('/updatepayment/post',[OrderdetailController::class,'updatepayment'])->name('updatepayment.post');
Route::get('/ordercomplete', [OrderdetailController::class,'ordercomplete'])->name('ordercomplete');

Route::post('/addwishlist/post',[ProductController::class,'addwishlist'])->name('addwishlist.post');

Route::get('/wishlist',[ProductController::class,'wishlistpage'])->name('wishlist');

Route::post('/destroywishlist/post',[ProductController::class,'destroywishlist'])->name('destroywishlist.post');
