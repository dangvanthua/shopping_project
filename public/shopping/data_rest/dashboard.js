document.addEventListener('DOMContentLoaded', function () {
    const dashboard = document.getElementById('dashboard_list');
    if (!dashboard) {
        console.error('Không tìm thấy phần tử dashboard_list');
        return;
    }
    fetch(`api/dashboard`).then(response => response.json())
        .then(data => {
            dashboard.innerHTML = ''; // Reset nội dung

            if (data.data.length > 0) {
                data.data.forEach(item => {
                    const formatMoney = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(item.price);

                    const row = `
                        <tr>
                            <td></td>
                            <td>
                                <ul>
                                    <li>Name: ${item.order.customer ? item.order.customer.name : 'N/A'}</li>
                                    <li>Email: ${item.order.customer ? item.order.customer.email : 'N/A'}</li>
                                    <li>Phone: ${item.order.customer ? item.order.customer.phone : 'N/A'}</li>
                                    <li>Address: ${item.order.customer ? item.order.customer.address : 'N/A'}</li>
                                </ul>
                            </td>
                            <td>${formatMoney}</td>
                            <td>
                                <span class="label label-success" style="cursor: default; pointer-events: none;">
                                    ${item.status}
                                </span>
                            </td>
                            <td>
                                <span class="label label-info" style="cursor: default; pointer-events: none;">
                                    ${item.order.payment.payment_method}
                                </span>
                            </td>
                            <td>${moment(item.created_at).format("DD/MM/YYYY")}</td>
                        </tr>`;
                    dashboard.innerHTML += row;
                });
            } else {
                dashboard.innerHTML = '<tr><td colspan="7">Không có đơn hàng</td></tr>';
            }
        }).catch(error => console.error('Có lỗi xảy ra:', error));

});
document.addEventListener('DOMContentLoaded', function () {
    getAllItems();

});

// viết phương thức hiện thị toàn bộ đơn hàng qua button
function getAllItems() {
    const item_dashboard = document.getElementById('list_item');
    if (!item_dashboard) {
        console.error('Không tìm thấy phần tử list_item');
        return;
    }
    
    fetch(`api/get-orders`)
        .then(response => response.json())
        .then(data => {
            item_dashboard.innerHTML = ''; // Xóa nội dung cũ
            if (data && data.data.length > 0) {
                data.data.forEach(item => {
                    const formatMoney = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(item.price);
                    const row = `
                        <tr>
                            <td>100</td>
                            <td>
                                <ul>
                                    <li>Name: ${item.order.customer ? item.order.customer.name : 'N/A'}</li>
                                    <li>Email: ${item.order.customer ? item.order.customer.email : 'N/A'}</li>
                                    <li>Phone: ${item.order.customer ? item.order.customer.phone : 'N/A'}</li>
                                    <li>Address: ${item.order.customer ? item.order.customer.address : 'N/A'}</li>
                                </ul>
                            </td>
                            <td>${formatMoney}</td>
                            <td class="status-cell">
                             <span class="label label-warning" style="cursor: default; pointer-events: none;">
                                    ${item.status}
                                </span>
                            </td>

                            <td>
                                <span class="label label-info" style="cursor: default; pointer-events: none;">
                                    ${item.order.payment.payment_method}
                                </span>
                            </td>
                            <td>${moment(item.created_at).format("DD/MM/YYYY")}</td>
                            <td>
                                <a href="" class="btn btn-xs btn-info js-preview-view" data-id="${item.id_order_item}">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-xs">Action</button>
                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="" class="update-status" data-id="${item.id_order_item}" data-status="Đang Chuẩn Bị">Đang Chuẩn Bị</a></li>
                                        <li><a href="" class="update-status" data-id="${item.id_order_item}" data-status="Đã Bàn Giao">Đã Bàn Giao</a></li>
                                        <li><a href="" class="update-status" data-id="${item.id_order_item}" data-status="Đang Vận Chuyển">Đang Vận Chuyển</a></li>
                                        <li><a href="" class="update-status" data-id="${item.id_order_item}" data-status="Hủy">Hủy</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>`;
                    item_dashboard.innerHTML += row; // Thêm nội dung vào bảng
                });

                // Gắn sự kiện click cho nút View sau khi các phần tử được thêm vào DOM
                document.querySelectorAll('.js-preview-view').forEach(button => {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        // Lấy ID đơn hàng từ thuộc tính data-id
                        const orderId = this.getAttribute('data-id');
                        console.log(orderId);
                        // Gọi hàm fetchOrderDetails để lấy chi tiết đơn hàng
                        getDetailViewData(orderId);
                    });
                });

                // Gắn sự kiện cập nhật trạng thái cho các nút sau khi các phần tử được thêm vào DOM
                document.querySelectorAll('.update-status').forEach(button => {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        const orderId = this.getAttribute('data-id');
                        const newStatus = this.getAttribute('data-status');
                        // Gọi API cập nhật trạng thái
                        updateStatusDashBoard(orderId, newStatus);
                    });
                });
            } else {
                item_dashboard.innerHTML = '<tr><td colspan="7">Không có đơn hàng</td></tr>';
            }
        })
        .catch(error => console.error('Đã có lỗi xảy ra:', error));
}


//@viết hàm cập nhật trạng thái đơn hàng
function updateStatusDashBoard(idOrder, newStatus) {
    fetch(`${window.location.origin}/api/update/dashboard-status/${idOrder}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                status: newStatus
            })
        })
        .then(response => {
            // Kiểm tra nếu phản hồi không phải là JSON
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Chỉ cố gắng phân tích nếu phản hồi là OK
        })
        .then(data => {
            if (data.message === 'Cập nhật thành công') {
                // Cập nhật lại giao diện
                const statusLabel = document.querySelector(`[data-id="${idOrder}"]`).closest('tr').querySelector('.status-cell');;
                statusLabel.innerHTML = `<span class="label label-warning">${newStatus}</span>`;
            } else {
                console.error('Cập nhật thất bại:', data.message);
            }
        })
        .catch(error => console.error('Đã có lỗi xảy ra:', error));
}

// viết hàm xử lý chi tiết view
function getDetailViewData(order_id) {
    fetch(`api/view-detail_items/${order_id}`).then(response => {
            if (!response.ok) {
                throw new Error('Not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.message === 'Not Found') {
                alert("Không có dữ liệu");
                return;
            }
            // thực thi cập nhật thông tin khách hàng
            console.log(data.customer.name);
            document.getElementById('customer_name').innerText = data.customer.name;
            document.getElementById('customer_email').innerText = data.customer.email;
            document.getElementById('customer_phone').innerText = data.customer.phone;
            document.getElementById('customer_address').innerText = data.customer.address;
        }).catch(error => console.error("Đã có lỗi xảy ra", error));
}
