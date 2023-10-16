<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/login', [AuthController::class, 'showLoginForm']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/welcome', [AuthController::class, 'welcome']);
// Route::get('/logout', [AuthController::class, 'logout']);
// Route::get('/regenerate', [AuthController::class, 'regenerateSession']);




 Route::get('/product', [ProductController::class, 'index'])->middleware('auth.user'); 
Route::get('cart', [ProductController::class, 'cart'])->name('cart')->middleware('auth.user'); 
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart')->middleware('auth.user'); 
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart')->middleware('auth.user'); 
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart')->middleware('auth.user'); 

Route::post('/logout', [UserController::class,'logout'])->name('logout');
Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('/store', [UserController::class, 'store'])->name('user.store');



Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/welcome', [UserController::class, 'welcome']);
Route::get('/regenerate', [UserController::class, 'regenerateSession']);


