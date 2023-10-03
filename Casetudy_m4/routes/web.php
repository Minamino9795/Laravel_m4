<?php

use App\Http\Controllers\CategoryController;
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




// Route::get('/usershop', function () {
    //     return view('Usershop.index');
    // });

    //xóa mềm category=============
Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('category.softdeletes');
Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');
Route::put('category/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('category.restoredelete');
Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category_destroy');

    //xóa mềm product=============

Route::put('product/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
Route::get('product/trash', [ProductController::class, 'trash'])->name('product.trash');
Route::put('product/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product_destroy');


//route admin==========
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);


//đăng ký tài khoản==============
Route::get('shop/register', [ShopController::class, 'register'])->name('shop.register');
Route::post('shop/checkRegister', [ShopController::class, 'checkRegister'])->name('shop.checkRegister');
// đăng nhập tài khoản==============
Route::post('/login', [ShopController::class, 'checklogin'])->name('shop.checklogin');
Route::get('/login', [ShopController::class, 'login'])->name('shop.login');