<?php

use App\Http\Controllers\CategoryProductController;

use App\Http\Controllers\CategoryProductView;
use App\Http\Controllers\ProductView;
use App\Http\Controllers\CategoryViewController;
use App\Http\Controllers\Demo_OderController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;


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

Route::get('demo',[TestController::class,'testcai']);

//Route::get('index',[CategoryProductView::class, 'index'])->name('index');

//Route::get('/category/create',[CategoryProductView::class, 'create'])->name('create');
//Route::post('/category/store',[CategoryProductView::class, 'store'])->name('category.store');


//Sanpham
Route::get('all-product', [ProductView::class, 'all_product'])->name('all_product');
Route::get('add-product', [ProductView::class, 'add_product'])->name('add_product');
Route::post('save-product', [ProductView::class, 'save_product'])->name('save_product');

Route::get('unactive-product/{product_id}', [ProductView::class, 'unactive_product'])->name('unactive_product');
Route::get('active-product/{product_id', [ProductView::class, 'active_product'])->name('active_product');
Route::get('edit-product/{product_id}', [ProductView::class, 'edit_product'])->name('edit_product');
Route::post('update-product/{product_id}', [ProductView::class, 'update_product'])->name('updatate_product');
Route::get('delete-product/{product_id}', [ProductView::class, 'delete_product'])->name('delete_product');


//Category_product
Route::get('/add-category-product', [CategoryProductView::class, 'add_category_product'])->name('add_category_product');
Route::get('/all-category-product', [CategoryProductView::class, 'all_category_product'])->name('all_category_product');
Route::post('save-category-product', [CategoryProductView::class, 'save_category_product'])->name('save_category_product');
//Route::get('/api/all-category-product', [CategoryProductController::class, 'api_all_category_product'])->name('api.all_category_product');

Route::get('unactive-category-product/{category_product_id}', [CategoryProductView::class, 'unactive_category_product'])->name('unactive_category_product');
Route::get('active-category-product/{category_product_id}', [CategoryProductView::class, 'active_category_product'])->name('active_category_product');
//Sua
Route::get('edit-category-product/{category_product_id}', [CategoryProductView::class, 'edit_category_product'])->name('edit_category_product');
Route::post('update-category-product/{category_product_id}', [CategoryProductView::class, 'update_category_product'])->name('update_category_product');
// //Xoa

Route::get('delete-category-product/{category_product_id}', [CategoryProductView::class, 'delete_category_product'])->name('delete_category_product');

Route::get('delete-category-product/{category_product_id}', [CategoryProductView::class, 'delete_category_product'])->name('delete_category_product');

Route::get('demo', [Demo_OderController::class, 'showData']);
Route::get('view', [Demo_OderController::class, 'showView'])->name("view");

Route::get('category', [CategoryViewController::class, 'index']);

// Route home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/filter/products', [HomeController::class, 'filter'])->name('filter.products');
Route::post('/load-more/products', [HomeController::class, 'loadMore']);


//Route About

Route::get('/about', [AboutController::class, 'about'])->name('about');

// Route Event
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('create');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
Route::delete('/events/{id}/delete', [EventController::class, 'destroy'])->name('deleteEvent');


