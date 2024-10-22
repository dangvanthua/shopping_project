<?php

use App\Http\Controllers\Api\AtributeController;
use App\Http\Controllers\Api\AttributeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DashboardController;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/category', [CategoryController::class, 'index']);

// Thực thi với attribute
Route::get('/attribute',[AttributeController::class,'getDataJson']);
Route::delete('/attribute/{id}',[AttributeController::class, 'deteleDataAttribute']);
Route::get('/attribute/create',[AttributeController::class, 'showCreateAttribute']);
Route::post('/attribute/create', [AttributeController::class, 'createDataAttribute']);
Route::get('attribute/update/{id}',[AttributeController::class, 'showEditAttribute']);
Route::put('attribute/update/{id}',[AttributeController::class, 'updateDataAttribute']);
// tìm kiếm
Route::get('attribute/search',[AttributeController::class, 'searchAttribute']);

// thực thi với dashboard
Route::get('/dashboard',[DashboardController::class,'getItemDashBoard']);
Route::get('/get-orders',[DashboardController::class, 'getAllItemDashboard']);