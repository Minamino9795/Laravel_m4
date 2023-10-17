<?php

use App\Http\Controllers\ExpensController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



Route::resource('/chitieu', ExpensController::class);