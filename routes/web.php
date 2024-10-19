<?php

use App\Http\Controllers\CategoryViewController;
use App\Http\Controllers\Demo_OderController;
use App\Http\Controllers\TestController;
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
    return view('welcome');
});

// Route::get('/demo',TestController::class,'testcai');
Route::get('demo',[Demo_OderController::class,'showData']);
Route::get('view',[Demo_OderController::class,'showView'])->name("view");

Route::get('category', [CategoryViewController::class, 'index']);
