@extends('LayOut.shopping.master_shopping')
@section('content')
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="{{ asset('images/' . $product->images) }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset('images/' . $product->images) }}" alt="IMG-PRODUCT">
                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="images/product-detail-01.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="item-slick3" data-thumb="{{ asset('images/' . $product->images) }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset('images/' . $product->images) }}" alt="IMG-PRODUCT">
                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="images/product-detail-02.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @hiển thị sản phẩm chi tiết --}}
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{ $product->name }}
                    </h4>
                    <span class="mtext-106 cl2" id="total-price">
                        {{ $product->price }}
                    </span>
                    <div class="p-t-33">
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Size
                            </div>
                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" name="size">
                                        @foreach ($size as $items)
                                        <option value="{{ $items->id_attribute_value }}">{{ $items->value }}</option>
                                        @endforeach
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Color
                            </div>
                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" name="color">
                                        @foreach ($color as $items)
                                        <option value="{{ $items->id_attribute_value }}">{{ $items->value }}</option>
                                        @endforeach
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" data-id="{{ $product->id_product }}">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>
                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product"
                                        id="product-quantity" value="1" min="1" readonly>
                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                        data-id="{{ $product->id_product }}">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                                <button
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
                                    data-id="{{ $product->id_product }}">
                                    Add to cart
                                </button>
                            </div>
                            <p>Tổng giá: <span id="total-price">{{ $product->price }}</span> VND</p>
                        </div>
                    </div>
                    <!--  -->
                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#"
                                class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>
                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                            data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {{ $product->describe }}
                            </p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm" id="review-info">
                                    @foreach($reviews as $review)
                                        <!-- Review -->
                                        <div class="flex-w flex-t p-b-68" data-review-id="{{$review->id_review}}">
                                           
                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        {{--@tạm thời lỗi --}}
                                                    </span>
    
                                                    <span class="fs-18 cl11">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="zmdi {{ $i <= $review->rating ? 'zmdi-star' : 'zmdi-star-outline' }}"></i>
                                                        @endfor
                                                    </span>
                                                </div>
                                                <p class="stext-102 cl6">
                                                      {{ $review->comment }}
                                                </p>

                                                <div class="review-actions">
                                                    <i class="zmdi zmdi-edit edit-icon" data-id="{{ $review->id_review }}" style="cursor: pointer;"></i>
                                                    <i class="zmdi zmdi-delete delete-icon" data-id="{{ $review->id_review }}" style="cursor: pointer; margin-left: 10px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add review -->
                                <form class="w-full" id="form-review">
                                    <h5 class="mtext-108 cl2 p-b-7">
                                        Add a review
                                    </h5>
                                    <div class="flex-w flex-m p-t-50 p-b-23">
                                        <span class="stext-102 cl3 m-r-16">
                                            Your Rating
                                        </span>
                                        <span class="wrap-rating fs-18 cl11 pointer">
                                            <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                            <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                            <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                            <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                            <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                            <input class="dis-none" type="number" name="rating">
                                        </span>
                                         <div class="error-message" id="rating-error" style="margin-left: 12px; color: red;"></div>
                                    </div>
                                    <div class="row p-b-25">
                                        <div class="col-12 p-b-5">
                                            <label class="stext-102 cl3" for="review">Your review</label>
                                            <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            <div class="error-message" id="comment-error" style="color: red;"></div>
                                        </div>
                                    </div>
                                    <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25">
            SKU: JAK-01
        </span>

        <span class="stext-107 cl6 p-lr-25">
            Categories: Jacket, Men
        </span>
    </div>
</section>
<script src="{{ asset("shopping/data_rest/shopping_cart.js")}}"></script>
{{-- <script src="{{ asset("shopping/data_rest/shopping_cart.js" --}}{{-- àm thêm giỏ hàng liên tục --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Truyền `session ID` từ server vào biến JavaScript
        const sessionIdFromServer = "{{ session()->getId() }}";

        // Kiểm tra nếu không có session trong Local Storage thì lưu vào
        if (!localStorage.getItem('id_session')) {
            localStorage.setItem('id_session', sessionIdFromServer);
            console.log("Local Storage: Đã lưu mới session ID từ server:", sessionIdFromServer);
        } else {
            const storedSessionId = localStorage.getItem('id_session');
            console.log("Local Storage: Đã tồn tại session ID:", storedSessionId);

            // Cập nhật cookie dựa trên Local Storage để đảm bảo tính nhất quán
            document.cookie = "laravel_session=" + storedSessionId + "; path=/; SameSite=Lax";
        }

        // Kiểm tra giá trị trong Console
        console.log("Session ID từ Local Storage:", localStorage.getItem('id_session'));
        console.log("Session ID từ Cookie:", document.cookie);
    });
</script>
@endsection