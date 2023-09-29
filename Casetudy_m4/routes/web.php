<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('Usershop.master');
});
// Route::get('/usershop', function () {
//     return view('Usershop.index');
// });
Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('category.softdeletes');
Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');
Route::put('category/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('category.restoredelete');
Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category_destroy');

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);

//xóa mềm
