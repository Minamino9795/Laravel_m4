<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategorylistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// route của layout user
// Route::get('/', function () {
//     return view('Usershop.master');
// });

// Route::get('/', function () {
//     return view('Home.index');
// });
// route người dùng================
Route::get('/', [HomeController::class, 'index'])->name('shop.index');
Route::get('/home/detail/{id}', [HomeController::class, 'detail'])->name('shop.detail');

// Route::get('/c', [CategorylistController::class, 'index'])->name('list.index');



// Route::get('/usershop', function () {
    //     return view('Usershop.index');
    // });

    //xóa mềm category=============
Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('category.softdeletes')->middleware('checkloginadmin');
Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash')->middleware('checkloginadmin');
Route::put('category/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('category.restoredelete')->middleware('checkloginadmin');
Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category_destroy')->middleware('checkloginadmin');

    //xóa mềm product=============

Route::put('product/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes')->middleware('checkloginadmin');
Route::get('product/trash', [ProductController::class, 'trash'])->name('product.trash')->middleware('checkloginadmin');
Route::put('product/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete')->middleware('checkloginadmin');
Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product_destroy')->middleware('checkloginadmin');


//route admin==========
Route::resource('category', CategoryController::class)->middleware('checkloginadmin');
Route::resource('product', ProductController::class)->middleware('checkloginadmin');


//đăng ký tài khoản==============
Route::get('shop/register', [ShopController::class, 'register'])->name('shop.register');
Route::post('shop/checkRegister', [ShopController::class, 'checkRegister'])->name('shop.checkRegister');
// đăng nhập tài khoản==============
Route::post('/login', [ShopController::class, 'checklogin'])->name('shop.checklogin');
Route::get('/login', [ShopController::class, 'login'])->name('shop.login');

// shop============
Route::get('/cart', [CartController::class, 'Cart'])->name('cart.index');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::get('/store/{id}', [CartController::class, 'addtocart'])->name('shop.addtocart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

// login admin===============
Route::post('/loginadmin', [ShopController::class, 'checkloginadmin'])->name('shop.checkloginadmin');
Route::get('/loginadmin', [ShopController::class, 'loginadmin'])->name('shop.loginadmin');
Route::post('/logout', [ShopController::class,'logout'])->name('logout');
Route::get('/logout', [ShopController::class, 'logout']);
