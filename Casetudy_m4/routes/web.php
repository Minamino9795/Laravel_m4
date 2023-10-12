<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategorylistController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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







//đăng ký tài khoản==============
Route::get('shop/register', [ShopController::class, 'register'])->name('shop.register');
Route::post('shop/checkRegister', [ShopController::class, 'checkRegister'])->name('shop.checkRegister');
// đăng nhập tài khoản==============
Route::post('/login', [ShopController::class, 'checklogin'])->name('shop.checklogin');
Route::get('/login', [ShopController::class, 'login'])->name('shop.login');
Route::post('/logoutuser', [ShopController::class, 'checklogout'])->name('checklogout');
Route::get('/logoutuser', [ShopController::class, 'checklogout']);


// shop============
Route::get('/cart', [CartController::class, 'Cart'])->name('cart.index');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::get('/store/{id}', [CartController::class, 'addtocart'])->name('shop.addtocart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

// login admin===============

Route::get('/loginadmin', [AuthController::class, 'login'])->name('login');
Route::post('/loginadmin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/logoutadmin', [AuthController::class, 'logout'])->name('logout');

// Route::post('/loginadmin', [ShopController::class, 'checkloginadmin'])->name('shop.checkloginadmin');
// Route::get('/loginadmin', [ShopController::class, 'loginadmin'])->name('shop.loginadmin');
// Route::post('/logout', [ShopController::class,'logout'])->name('logout');
Route::get('/logout', [ShopController::class, 'logout']);
Route::get('/checkOuts', [ShopController::class, 'checkOuts'])->name('checkOuts');
Route::post('/order', [ShopController::class, 'order'])->name('order');

Route::prefix('/')->middleware(['auth', 'preventBackHistory'])->group(function () {


    //xóa mềm category=============
    Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('category.softdeletes');
    Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::put('category/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('category.restoredelete');
    Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category_destroy');
    // chuyển đổi ngôn ngữ==========
    Route::get('lang/change', [CategoryController::class, 'change'])->name('changeLang');
    //xóa mềm product=============

    Route::put('product/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
    Route::get('product/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::put('product/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
    Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product_destroy');


    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);


    // Route users=====================
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/editpass/{id}', [UserController::class, 'editpass'])->name('user.editpass');
    Route::put('/user/updatepass/{id}', [UserController::class, 'updatepass'])->name('user.updatepass');
    Route::get('/user/adminpass/{id}', [UserController::class, 'adminpass'])->name('user.adminpass');
    Route::put('/user/adminUpdatePass/{id}', [UserController::class, 'adminUpdatePass'])->name('user.adminUpdatePass');

    // Route groups =============
    Route::get('group', [GroupController::class, 'index'])->name('group.index');
    Route::get('/create', [GroupController::class, 'create'])->name('group.create');
    Route::post('/store', [GroupController::class, 'store'])->name('group.store');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
    Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
    Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
    Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');


    // Route order==============

    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::get('/xuat', [OrderController::class, 'exportOrder'])->name('xuat');
});
