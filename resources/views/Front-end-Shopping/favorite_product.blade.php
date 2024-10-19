@extends('LayOut.shopping.master_shopping')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('shopping/css/favorite.css') }}">
    <div class="container mt-5">
        <h2 class="mb-4">Favorites</h2>
    
        <!-- Product 1 -->
        <div class="row product-card">
            <div class="col-md-2 d-flex align-items-center">
                <img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid product-img">
            </div>
            <div class="col-md-8">
                <p class="product-title">Áo khoác gió nam-nữ 2 lớp Mũ Rộng có túi trong sâu, Áo khoác dù chất liệu vải gió cao cấp cản gió kháng nước</p>
                <div class="rating mb-2">
                    <span>4</span>
                    <i class="fa fa-star"></i>
                    <span class="text-muted">| 297 đánh giá | 1.1k đã bán</span>
                </div>
                <p>
                    <span class="product-old-price">118.000đ</span>
                    <span class="product-price">80.000đ</span>
                </p>
            </div>
            <div class="col-md-2 buttons">
                <button class="btn btn-remove">Xóa</button>
                <button class="btn btn-view">Xem</button>
            </div>
        </div>
    
        <!-- Product 2 -->
        <div class="row product-card">
            <div class="col-md-2 d-flex align-items-center">
                <img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid product-img">
            </div>
            <div class="col-md-8">
                <p class="product-title">[HOT] Loa Bluetooth Mini Loa bluetooth mini di động cầm tay Đèn LED Đổi Màu - Tặng Kèm Dây Sạc</p>
                <div class="rating mb-2">
                    <span>4</span>
                    <i class="fa fa-star"></i>
                    <span class="text-muted">| 297 đánh giá | 1.1k đã bán</span>
                </div>
                <p>
                    <span class="product-old-price">118.000đ</span>
                    <span class="product-price">37.000đ</span>
                </p>
            </div>
            <div class="col-md-2 buttons">
                <button class="btn btn-remove">Xóa</button>
                <button class="btn btn-view">Xem</button>
            </div>
        </div>
    
        <!-- Product 3 -->
        <div class="row product-card">
            <div class="col-md-2 d-flex align-items-center">
                <img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid product-img">
            </div>
            <div class="col-md-8">
                <p class="product-title">Nước hoa nam Choice Việt Nam TH003 thơm lâu 55ml</p>
                <div class="rating mb-2">
                    <span>4</span>
                    <i class="fa fa-star"></i>
                    <span class="text-muted">| 297 đánh giá | 1.1k đã bán</span>
                </div>
                <p>
                    <span class="product-old-price">118.000đ</span>
                    <span class="product-price">80.000đ</span>
                </p>
            </div>
            <div class="col-md-2 buttons">
                <button class="btn btn-remove">Xóa</button>
                <button class="btn btn-view">Xem</button>
            </div>
        </div>
    
         <div class="row product-card">
            <div class="col-md-2 d-flex align-items-center">
                <img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid product-img">
            </div>
            <div class="col-md-8">
                <p class="product-title">Nước hoa nam Choice Việt Nam TH003 thơm lâu 55ml</p>
                <div class="rating mb-2">
                    <span>4</span>
                    <i class="fa fa-star"></i>
                    <span class="text-muted">| 297 đánh giá | 1.1k đã bán</span>
                </div>
                <p>
                    <span class="product-old-price">118.000đ</span>
                    <span class="product-price">80.000đ</span>
                </p>
            </div>
            <div class="col-md-2 buttons">
                <button class="btn btn-remove">Xóa</button>
                <button class="btn btn-view">Xem</button>
            </div>
        </div>
    
    </div>
@endsection