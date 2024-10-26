document.addEventListener('DOMContentLoaded', function () {
    getAllItems();
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

// viết phương thức hiện thị toàn bộ đơn hàng qua button
function getAllItems(page = 1) {
    const item_dashboard = document.getElementById('list_item');
    if (!item_dashboard) {
        console.error('Không tìm thấy phần tử list_item');
        return;
    }
    fetch(`api/get-orders`)
        .then(response => response.json())
        .then(data => {
            item_dashboard.innerHTML = ''; // Xóa nội dung cũ
            console.log(data.data);
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
                                <a href="/view-detail/${item.id_order_item}" class="btn btn-xs btn-info js-preview-view" data-id="${item.id_order_item}">
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


                // // Gắn sự kiện click cho nút View sau khi các phần tử được thêm vào DOM
                // document.querySelectorAll('.js-preview-view').forEach(button => {
                //     button.addEventListener('click', function (event) {
                //         event.preventDefault();
                //         // Lấy ID đơn hàng từ thuộc tính data-id
                //         const orderId = this.getAttribute('data-id');
                //         console.log("Nhấn được mà đúng ko!!");
                //         // Gọi hàm fetchOrderDetails để lấy chi tiết đơn hàng
                //         getDetailViewData(orderId);
                //     });
                // });
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
                // Hiển thị các link phân trang
                const paginationLinks = document.getElementById('pagination-links');
                paginationLinks.innerHTML = createPaginationLinks(data);
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
// function getDetailViewData(order_id) {
//     fetch(`api/view-detail_items/${order_id}`)
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Not ok');
//             }
//             return response.json();
//         })
//         .then(data => {
//             if (data.message === 'Not Found') {
//                 alert("Không có dữ liệu");
//                 return;
//             }
//             // Kiểm tra và cập nhật nội dung vào phần tử DOM nếu nó tồn tại
//             const customerNameElem = document.getElementById('customer_name');
//             if (customerNameElem) {
//                 customerNameElem.innerText = data.customer.name;
//             } else {
//                 console.error('Phần tử customer_name không tồn tại');
//             }

//             const customerEmailElem = document.getElementById('customer_email');
//             if (customerEmailElem) {
//                 customerEmailElem.innerText = data.customer.email;
//             } else {
//                 console.error('Phần tử customer_email không tồn tại');
//             }
//             const customerPhoneElem = document.getElementById('customer_phone');
//             if (customerPhoneElem) {
//                 customerPhoneElem.innerText = data.customer.phone;
//             } else {
//                 console.error('Phần tử customer_phone không tồn tại');
//             }

//             const customerAddressElem = document.getElementById('customer_address');
//             if (customerAddressElem) {
//                 customerAddressElem.innerText = data.customer.address;
//             } else {
//                 console.error('Phần tử customer_address không tồn tại');
//             }
//         })
//         .catch(error => console.error("Đã có lỗi xảy ra", error));
// }

//@ hàm hiện thị view cho tìm kiếm dashboard
function showViewSearchDashboard(data_dashboard) {
    const data_view = document.getElementById('list_item');
    data_view.innerHTML = ''; // Xóa nội dung cũ
    data_dashboard.forEach(item => {
        const row = document.createElement('tr');
        // Định dạng tiền tệ
        const formatMoney = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(item.total_item || 0);
        // Nhúng HTML vào `row`
        row.innerHTML = `
            <td>100</td>
            <td>
                <ul>
                    <li>Name: ${item.customer && item.customer ? item.customer.name : 'N/A'}</li>
                    <li>Email: ${item.customer && item.customer ? item.customer.email : 'N/A'}</li>
                    <li>Phone: ${item.customer && item.customer ? item.customer.phone : 'N/A'}</li>
                    <li>Address: ${item.customer && item.customer ? item.customer.address : 'N/A'}</li>
                </ul>
            </td>
            <td>${formatMoney}</td>
            <td class="status-cell">
                <span class="label label-warning" style="cursor: default; pointer-events: none;">
                    ${item.status || 'N/A'}
                </span>
            </td>
            <td>
                <span class="label label-info" style="cursor: default; pointer-events: none;">
                    ${item.order && item.order.payment ? item.order.payment.payment_method : 'N/A'}
                </span>
            </td>
            <td>${item.created_at ? moment(item.created_at).format("DD/MM/YYYY") : 'N/A'}</td>
            <td>
                <a href="" class="btn btn-xs btn-info js-preview-view" data-id="${item.id_order_item}">
                    <i class="fa fa-eye"></i> View
                </a>
                <div class="btn-group">
                    <button type="button" class="btn btn-success btn-xs">Action</button>
                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
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
        `;
        // Thêm hàng `row` vào `data_view`
        data_view.appendChild(row);
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
    });
}

// Hàm xử lý sự kiện tìm kiếm dashboard
document.getElementById('btn-search').addEventListener('click', function (event) {
    event.preventDefault();
    const data_query = document.getElementById('search_email').value.trim();
    // thực hiện kiểm tra giá trị có điền vào ko
    if(!data_query)
    {
       alert("Chưa có dữ liệu trong các ô cần tìm");
        return;
    }
    // Gọi API để lấy dữ liệu
    fetch(`api/dashboard/search?query=${data_query}`)
        .then(response => response.json())
        .then(data => {
            if (data.data.length > 0) {
                // Hiển thị kết quả tìm kiếm
                showViewSearchDashboard(data.data);
            } else {
                document.getElementById('list_item').innerHTML = '<tr><td colspan="5">Không tìm thấy kết quả</td></tr>';
            }
        })
        .catch(error => console.error("Đã có lỗi xảy ra", error));
});
// @hàm xử lý phân trang
function createPaginationLinks(data) {
    let links = '';
    if (data.prev_page_url) {
        links += `<li><a href="#" class="pagination-link" data-page="${data.current_page - 1}">Previous</a></li>`;
    }

    for (let i = 1; i <= data.last_page; i++) {
        links += `<li class="${i === data.current_page ? 'active' : ''}">
                    <a href="#" class="pagination-link" data-page="${i}">${i}</a>
                  </li>`;
    }

    if (data.next_page_url) {
        links += `<li><a href="#" class="pagination-link" data-page="${data.current_page + 1}">Next</a></li>`;
    }
    return links;
}
