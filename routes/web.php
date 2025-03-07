<?php


use App\Http\Controllers\AdminDashboardViewController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\GetCartShoppingController;
use App\Http\Controllers\AttributeViewController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\CategoryProductView;
use App\Http\Controllers\ProductView;
use App\Http\Controllers\CategoryViewController;
use App\Http\Controllers\Auth\RegistController;
use App\Http\Controllers\Api\GetAllItemsShoppingCart;
use App\Http\Controllers\Api\PayMonneyController;
use App\Http\Controllers\Api\ShoppingCartController;
use App\Http\Controllers\DetailProductViewController;
use App\Http\Controllers\GetCartShoppingViewController;
use App\Http\Controllers\GetViewAllItemsShoppingCart;
use App\Http\Controllers\PayMonneyViewController;
use App\Http\Controllers\RatingViewController;
use App\Http\Controllers\ShoppingCartViewController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Api\PaymentByVNPayController;
use App\Http\Controllers\Api\ProfileCustomerViewController;
use App\Http\Controllers\Api\VnPayController;
use App\Http\Controllers\DetailViewBuyItems;
use App\Http\Controllers\Error404ViewController;
use App\Http\Controllers\CategoryPostViewController;
use App\Http\Controllers\HistotyViewBuyItems;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentByVnPay;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StatisticalViewController;
use App\Http\Controllers\SuccessBuyItemsViewController;
use App\Http\Controllers\SuccessPaymoneyViewController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ShippingMethodController; // Đảm bảo bạn đã import đúng namespac

Route::get('/', function () {
    return view('welcome');
})->name('/home');

// Route::get('/testcai', [TestController::class, 'testcai']);
//@Cao Anh Vũ
// thực thi với theme dashboard
Route::get('/dashboard', [AdminDashboardViewController::class, 'showThemeDashBoard'])->name('index_dashboard');
Route::get('/get-orders', [AdminDashboardViewController::class, 'showIndexDashBoard'])->name('get-orders');
Route::get('view-detail/{id}', [AdminDashboardViewController::class, 'showViewDashBoard'])->name('get_view'); // hiển thị giao diện chi tiết view
//thực thi với thuộc tính sản phẩm
Route::get('/attribute', [AttributeViewController::class, 'showThemmeAttributeIndex'])->name('attribute');
// thực thi với chi tiết sản phẩm ở trang home
Route::get('product/{id_slug}', [DetailProductViewController::class, 'showViewProductDetail'])->name("showdetail"); // hiển thị sản phẩm chi tiết
// hiển thị và thực thi với giỏ hàng
Route::get('/shopping-cart', [GetViewAllItemsShoppingCart::class, 'showAllItemsShoppingCart'])->name('showShoppingCart'); //hiển thị trang giỏ hàng
// test cái nha @phần này test thuộc chi tiết sẩn phẩm
Route::get('/product', [ShoppingCartViewController::class, 'showDemoNha'])->name('showItems'); // chỉ là demo thôi nè
// hiển thị thanh toán
Route::get('/pay-money', [PayMonneyViewController::class, 'showViewPayMoney'])->name('payMoney');
// Đánh giá bên Admin
Route::get('/admin-rating', [RatingViewController::class, 'showViewRating'])->name('admin-rating'); // hiển thị view rating
Route::get('/about-me', [ProfileCustomerViewController::class, 'showViewProfileCustomer']); // hiển thị view chi tiết của khách hàng
Route::get('/history-buy', [HistotyViewBuyItems::class, 'showViewHistoryBuyItems'])->name('history-buy'); // hiển thị lịch sử mua hàng
Route::get('/detail-history/{id_order}', [DetailViewBuyItems::class, 'viewDetailBuyItems'])->name('order.details'); //hiển thị chi tiết sản phẩm đã mua
// thanh toán thành công
Route::get('/success-buy-items', [SuccessBuyItemsViewController::class, 'showViewSuccessBuyItems'])->name('success.buy');
//Thống kê bên admin
Route::get('/statistical', [StatisticalViewController::class, 'showStatisticalView'])->name('statistical');
Route::get('/404', [Error404ViewController::class, 'showViewError404'])->name('page-404'); // hiển thị trang 404
Route::get('/success-buy-items', [SuccessPaymoneyViewController::class, 'showViewSuccessPaymoney']); // trả về view thanh toán thành công

//@Đặng Văn Thuận
// Route home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/filter/products', [HomeController::class, 'filter'])->name('filter.products');
Route::post('/filter/price', [HomeController::class, 'filterByPrice'])->name('filter.price');
Route::post('/filter/sort', [HomeController::class, 'filterSort'])->name('filter.sort');
Route::post('/search/products', [HomeController::class, 'searchProducts']);
Route::post('/load-more/products', [HomeController::class, 'loadMore']);

// Route Event
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('create');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{id}/delete', [EventController::class, 'destroy'])->name('deleteEvent');
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
// Route Review
Route::get('/product-detail/{id_product}', [ReviewController::class, 'index'])->name('product_detail');
Route::post('/submit-review', [ReviewController::class, 'saveReview']);
Route::delete('/reviews/{id}', [ReviewController::class, 'removeReview']);
Route::put('/reviews/{id}', [ReviewController::class, 'updateReview']);
// Route User
Route::get('/auth/forgot_password', [UserController::class, 'showForgotPassword'])->name('auth.password');
Route::post('/auth/forgot_password', [UserController::class, 'submitFormForgetPassword'])->name('auth.sumitReset');
Route::get('/auth/get_password/{customer}/{token}', [UserController::class, 'showGetPassword'])->name('auth.getPassword');
Route::post('/auth/get_password/{customer}/{token}', [UserController::class, 'submitGetPassword'])->name('auth.submitPassword');


//@Lê Hoàng Thịnh
Route::get('register', [RegistController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistController::class, 'register'])->name('index.register');
Route::get('/verify/{token}', [RegistController::class, 'verify'])->name('verify');
//
Route::get('/category-post',[CategoryPostViewController::class, 'showViewCategoryPost'])->name('indexcategorypost');
Route::get('/add-categorypost',[CategoryPostViewController::class,'showViewAddCategoryPost'])->name('category-post-showadd');
Route::post('/add-categorypost',[CategoryPostViewController::class, 'addDataCategoryPost'])->name('adddatacategorypost');
Route::get('/delete-category-post/{id}',[CategoryPostViewController::class, 'deleteDataCategoryPost'])->name('delete-category-post');
Route::get('/update-category-post/{id}',[CategoryPostViewController::class, 'showUpdateDataCategoryPost'])->name('update-category-post');
Route::post('/update-category-post/{id}',[CategoryPostViewController::class, 'UpdateDataCategoryPost'])->name('updatecategorypost');


//@Trần Thanh Phong
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index'); // Trang hiển thị danh sách
Route::get('/favorites/{customerId}/{favoriteId}', [FavoriteController::class, 'show'])->name('favorites.show'); // Trang xem chi tiết
//Method
Route::get('/shipping-methods', [ShippingMethodController::class, 'indexView'])->name('shipping-methods.index');
Route::get('shipping-method/create', [ShippingMethodController::class, 'create'])->name('shipping-method.create');
Route::post('/shipping-methods', [ShippingMethodController::class, 'store'])->name('shipping-methods.store');
Route::get('/shipping-method/{id}/edit', [ShippingMethodController::class, 'edit'])->name('shipping-method.edit');
Route::put('/shipping-method/{id}', [ShippingMethodController::class, 'update'])->name('shipping-method.update');
Route::delete('/shipping-method/{id}', [ShippingMethodController::class, 'destroy'])->name('shipping-method.destroy');
//Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//@Đỗ Tiến Đại
//Sanpham
Route::get('all-product', [ProductView::class, 'all_product'])->name('all_product');
Route::get('add-product', [ProductView::class, 'add_product'])->name('add_product');
Route::post('save-product', [ProductView::class, 'save_product'])->name('save_product');
Route::get('search-product', [ProductView::class, 'searchProduct'])->name('search.product');
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
Route::get('search-category', [CategoryProductView::class, 'search'])->name('search_category');
Route::get('unactive-category-product/{category_product_id}', [CategoryProductView::class, 'unactive_category_product'])->name('unactive_category_product');
Route::get('active-category-product/{category_product_id}', [CategoryProductView::class, 'active_category_product'])->name('active_category_product');
//Sua
Route::get('edit-category-product/{category_product_id}', [CategoryProductView::class, 'edit_category_product'])->name('edit_category_product');
Route::post('update-category-product/{category_product_id}', [CategoryProductView::class, 'update_category_product'])->name('update_category_product');
// //Xoa
Route::get('delete-category-product/{category_product_id}', [CategoryProductView::class, 'delete_category_product'])->name('delete_category_product');
Route::get('delete-category-product/{category_product_id}', [CategoryProductView::class, 'delete_category_product'])->name('delete_category_product');
Route::get('category', [CategoryViewController::class, 'index']);
//Route About
Route::get('/about', [AboutController::class, 'about'])->name('about');
//Danh mục bài viết
Route::get('/category-post', [CategoryPostViewController::class, 'showViewCategoryPost'])->name('indexcategorypost');
Route::get('/add-categorypost', [CategoryPostViewController::class, 'showViewAddCategoryPost'])->name('category-post-showadd');
Route::post('/add-categorypost', [CategoryPostViewController::class, 'addDataCategoryPost'])->name('adddatacategorypost');
Route::get('/delete-category-post/{id}', [CategoryPostViewController::class, 'deleteDataCategoryPost'])->name('delete-category-post');
Route::get('/update-category-post/{id}', [CategoryPostViewController::class, 'showUpdateDataCategoryPost'])->name('update-category-post');
Route::post('/update-category-post/{id}', [CategoryPostViewController::class, 'UpdateDataCategoryPost'])->name('updatecategorypost');




