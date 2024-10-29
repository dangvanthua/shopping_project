// Lắng nghe sự kiện click trên các nút "Quick View"
document.querySelectorAll('.js-show-modal1').forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault();

        // Lấy ID sản phẩm từ thuộc tính data-id
        const productId = this.getAttribute('data-id');

        // Gọi API để lấy thông tin sản phẩm
        fetch(`/api/get-product/${productId}`)
            .then(response => response.json())
            .then(data => {
                if (data.message === "Giá trị hợp lệ") {
                    const product = data.product;

                    // Tạo HTML cho modal với dữ liệu sản phẩm
                    const modalContent = `
                        <div class="overlay-modal1 js-hide-modal1"></div>
                        <div class="container">
                            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                                    <img src="/shopping/images/icons/icon-close.png" alt="CLOSE">
                                </button>
                                <div class="row">
                                    <div class="col-md-6 col-lg-7 p-b-30">
                                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                                            <div class="wrap-slick3 flex-sb flex-w">
                                                <div class="wrap-slick3-dots"></div>
                                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                                                <div class="slick3 gallery-lb">
                                                    <div class="item-slick3" data-thumb="">
                                                        <div class="wrap-pic-w pos-relative">
                                                            <img src="" alt="IMG-PRODUCT">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-5 p-b-30">
                                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">${product.name}</h4>
                                            <span class="mtext-106 cl2">$${product.price}</span>
                                            <p class="stext-102 cl3 p-t-23">${product.describe}</p>
                                            <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    // Gắn HTML vào modal và hiển thị
                    const modalContainer = document.querySelector('.wrap-modal1');
                    modalContainer.innerHTML = modalContent;
                    modalContainer.classList.add('show-modal1');

                    // Thêm sự kiện để đóng modal khi bấm vào overlay hoặc nút đóng
                    document.querySelectorAll('.js-hide-modal1').forEach(closeButton => {
                        closeButton.addEventListener('click', function () {
                            modalContainer.classList.remove('show-modal1');
                        });
                    });
                } else {
                    console.error("Sản phẩm không tồn tại");
                }
            })
            .catch(error => console.error('Có lỗi xảy ra:', error));
    });
});
