<?php

use App\Http\Controllers\LangController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::resource('user', UserController::class);
Route::get('user/search',[UserController::class])->name('search');
Route::get('/', function () {
 return view('admin.master');
});




Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/welcome', [AuthController::class, 'welcome']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/regenerate', [AuthController::class, 'regenerateSession']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');


Route::get('/', function () {
    return view('welcome');
})->name('home');
