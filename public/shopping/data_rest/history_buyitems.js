document.addEventListener('DOMContentLoaded', function () {

    // Hàm hiển thị danh sách lịch sử mua hàng
    function showAllHistoryofItems() {
        fetch(`api/history-buy-items`).then(response => response.json())
            .then(data => {
                const getElement = document.getElementById('order-items');
                getElement.innerHTML = '';
                if (data.data.length > 0) {
                    data.data.forEach(items => {
                        const [year, month, day] = items.created_at.split('T')[0].split('-');
                        const formattedDate = `${day}/${month}/${year}`;
                        const row = `
                        <div class="order-item">
                            <div class="order-img">
                                <img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid">
                            </div>
                            <div class="order-info">
                                <p><strong>${items.customer_name}</strong></p>
                                <p>Địa chỉ: ${items.shipping_address}</p>
                                <p>Trạng thái: ${items.status}</p>
                                <p>Số điện thoại: ${items.customer_phone}</p>
                                <p>Ngày đặt hàng: ${formattedDate}</p>
                            </div>
                            <div class="order-price">
                                <del>118.000₫</del>
                                <div class="new-price">89.000₫</div>
                                <div class="order-total">
                                    <p>Thành tiền: <span class="new-price">${parseFloat(items.total_item).toLocaleString()}₫</span></p>
                                </div>
                                <div class="order-action">
                                    <button class="btn-readmore" data-id="${items.id_order}">Xem chi tiết</button>
                                </div>
                            </div>
                        </div>`;
                        getElement.insertAdjacentHTML('beforeend', row);
                    });
                    // Thêm sự kiện click cho tất cả các nút "Xem chi tiết"
                    const buttons = document.querySelectorAll('.btn-readmore');
                    buttons.forEach(button => {
                        button.addEventListener('click', function () {
                            const data_id = this.getAttribute('data-id');
                            console.log(document.getElementById('history_detail'));
                            viewDetailHistoryBuyItems(data_id);
                        });
                    });
                } else {
                    getElement.innerHTML = '<p>Không có lịch sử mua hàng.</p>';
                }
            }).catch(error => console.error('Đã có lỗi xảy ra', error));
    }

    // Hàm hiển thị chi tiết sản phẩm đã đặt
    function viewDetailHistoryBuyItems(id_order) {
        fetch(`/api/detail-history-items/${id_order}`).then(response => response.json())
            .then(data => {
                const getDataElement = document.getElementById('history_detail');
                if(!getDataElement)
                {
                    console.log("Khong tồn tại giá trị");
                    return;
                }
                getDataElement.innerHTML = '';

                if (data.message === "Lấy dữ liệu thành công") {
                    data.data.forEach(items => {
                        const order = items.order;
                        let productsHtml = '';

                        // Lặp qua các sản phẩm trong đơn hàng để hiển thị thông tin chi tiết
                        order.order_items.forEach(item => {
                            productsHtml += `
                                <div class="product-item">
                                    // <img src="${item.product.image_url}" alt="${item.product.name}">
                                    <div class="product-info">
                                        <p class="product-name">${item.product.name}</p>
                                        <p>Số lượng: ${item.quantity}</p>
                                        <p>Giá mỗi sản phẩm: ${Number(item.price).toLocaleString()}₫</p>
                                        <p>Thành tiền: ${(item.quantity * item.price).toLocaleString()}₫</p>
                                    </div>
                                </div>
                                <hr>`;
                        });

                        const row = `
                            <div class="order-summary">
                                <p><strong>Người nhận:</strong> ${order.customer_name}</p>
                                <p><strong>Địa chỉ giao hàng:</strong> ${order.shipping_address}</p>
                                <p><strong>Số điện thoại:</strong> ${order.customer_phone}</p>
                                <p><strong>Trạng thái đơn hàng:</strong> ${order.status}</p>
                                <p><strong>Ngày đặt hàng:</strong> ${new Date(order.order_date).toLocaleDateString()}</p>
                            </div>
    
                            <h3 class="mt-4">Danh sách sản phẩm</h3>
                            <div class="product-list">
                                ${productsHtml}
                            </div>
                            <div class="order-total">
                                <h4>Tổng cộng: ${Number(order.total_item).toLocaleString()}₫</h4>
                            </div>
                            <div class="text-center mt-4">
                                <a href="/order-history" class="btn btn-secondary">Quay lại lịch sử mua hàng</a>
                            </div>`;

                        getDataElement.insertAdjacentHTML('beforeend', row);
                    });
                } else {
                    getDataElement.innerHTML = '<p>Không có dữ liệu lịch sử cho đơn hàng này.</p>';
                }
            }).catch(error => console.error('Đã có lỗi xảy ra', error));
    }

    showAllHistoryofItems();
});
