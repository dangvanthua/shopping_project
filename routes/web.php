<?php
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\CategoryProductView;
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
