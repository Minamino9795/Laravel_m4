<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CartApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

use App\Http\Controllers\Api\AuthCustomerController;
use App\Http\Controllers\Api\OrderApiController;
use Spatie\FlareClient\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/home/detail/{id}', [ApiController::class, 'show'])->name('shop.detail');

Route::get('carts', [CartApiController::class, 'getAllCart']);
Route::post('addtocart', [CartApiController::class, 'addToCart']);
Route::put('update_cart', [CartApiController::class, 'update']);
Route::delete('carts/remove_cart/{id}', [CartApiController::class, 'removeToCart']);
Route::get('product_list/search', [CartApiController::class, 'search']);

Route::get('products', [ApiController::class, 'index']);
Route::get('products/{id}', [ApiController::class, 'detail']);
Route::get('carts', [CartApiController::class, 'allCart']);
Route::get('update_cart', [CartApiController::class, 'UpdateCart']);
Route::get('remove_to_cart/{id}', [CartApiController::class, 'removeToCart']);
Route::get('remove_allcart', [CartApiController::class, 'removeAllCart']);


// Route::post('/login', [AuthCustomerController::class, 'login']);
// Route::post('/register', [AuthCustomerController::class, 'register']);
// Route::post('/logout', [AuthCustomerController::class, 'logout']);
// Route::post('/refresh', [AuthCustomerController::class, 'refresh']);
// Route::post('/change-pass', [AuthCustomerController::class, 'changePassWord']);


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    // Route::post('/login', [AuthCustomerController::class, 'login']);
    // Route::post('/register', [AuthCustomerController::class, 'register']);
    Route::post('/logout', [AuthCustomerController::class, 'logout']);
    Route::post('/refresh', [AuthCustomerController::class, 'refresh']);
    Route::post('/change-pass', [AuthCustomerController::class, 'changePassWord']);

    Route::post('login', [AuthApiController::class, 'login']);
    Route::post('register', [AuthApiController::class, 'register']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('me', [AuthApiController::class, 'me']);

    });
    Route::post('orders/checkout', [OrderApiController::class, 'checkout']);
});
