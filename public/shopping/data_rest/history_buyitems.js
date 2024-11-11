document.addEventListener('DOMContentLoaded', function () {

    //@ viết hàm hiển thị danh sách lịch sử mua hàng
    function showAllHistoryofItems() {
        fetch(`api/history-buy-items`).then(response => response.json())
            .then(data => {
                const getElement = document.getElementById('order-items');
                getElement.innerHTML = '';
                if (data.data.length > 0) {
                    data.data.forEach(items => { // Sửa lại thành data trực tiếp nếu không có `data.data`
                         // Định dạng lại ngày ngắn gọn
                         const [year, month, day] = items.created_at.split('T')[0].split('-');
                         const formattedDate = `${day}/${month}/${year}`;
                        const row = `
                    <div class="order-item">
                        <div class="order-img">
                            <img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid">
                        </div>
                        <div class="order-info">
                            <p><strong>${items.customer_name}</strong></p>
                            <p>Ngày đặt hàng: ${items.quantity}</p>
                            <p>Ngày đặt hàng: ${formattedDate}</p>
                        </div>
                        <div class="order-price">
                            <del>118.000₫</del>
                            <div class="new-price">89.000₫</div>
                            <div class="order-total">
                                <p>Thành tiền: <span class="new-price">${parseFloat(items.total_item).toLocaleString()}₫</span></p>
                            </div>
                            <div class="order-action">
                                <button class="btn-rebuy">Mua lại</button>
                            </div>
                        </div>
                    </div> `;
                        getElement.insertAdjacentHTML('beforeend', row); // Thay container bằng getElement
                    });
                } else {
                    getElement.innerHTML = '<p>Không có lịch sử mua hàng.</p>';
                }
            }).catch(error => console.error('Đã có lỗi xảy ra', error));
    }
    showAllHistoryofItems();

});
