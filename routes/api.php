<?php

<<<<<<< HEAD
use App\Http\Controllers\Api\ProductController;
=======
use App\Http\Controllers\Api\CategoryController;
>>>>>>> trang_about_dotiendai
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\CategoryProductView;

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
<<<<<<< HEAD
Route::get('category', [CategoryProductView::class, 'api_all_category_product']);
Route::get('products', [ProductController::class, 'getAllProducts']);
Route::post('toggle-product-status/{id}', [ProductController::class ,'toggleStatus']);
Route::delete('delete-product/{id}', [ProductController::class, 'delete']);
=======

Route::get('categories', [CategoryProductController::class, 'api_all_category_product']);
// Route::apiResource('categories', CategoryProductController::class);
// Route::patch('categories/{id}/activate', [CategoryProductController::class, 'activate']);
// Route::patch('categories/{id}/deactivate', [CategoryProductController::class, 'deactivate']);
//Route::get('/category-products', [CategoryProductController::class, 'all_category_product_api']);
// Route::post('/category-products', [CategoryProductController::class, 'save_category_product_api']);


Route::get('/category', [CategoryController::class, 'index']);

>>>>>>> trang_about_dotiendai
