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


// viết phương thức hiện thị toàn bộ đơn hàng qua button
document.getElementById('btn-all-item').addEventListener('click', function (event) {
    event.preventDefault();
    // Gọi API để lấy danh sách đơn hàng
    fetch(`api/get-orders`)
        .then(response => response.json())
        .then(data => {
            const item_dashboard = document.getElementById('list_item');
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
                            <td>
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
                                        <li><a href="" class="update-status" data-id="${item.id_order_item}" data-status="Đang Vận Chuyển">Đang Vận Chuyển</a></li>
                                        <li><a href="" class="update-status" data-id="${item.id_order_item}" data-status="Đã Bàn Giao">Đã Bàn Giao</a></li>
                                        <li><a href="" class="update-status" data-id="${item.id_order_item}" data-status="Hủy">Hủy</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>`;
                    item_dashboard.innerHTML += row; // Thêm nội dung vào bảng
                });

                // Gắn sự kiện cập nhật trạng thái cho các nút
                document.querySelectorAll('.update-status').forEach(button => {
                    button.addEventListener('click', function(event) {
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
});





//@viết hàm cập nhật trạng thái đơn hàng
function updateStatusDashBoard(idOrder, newStatus) {
    fetch(`api/update/dashboard-status/${idOrder}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                status: newStatus
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Cập nhật thành công') {
                // cập nhật lại giao diện
                const statusLabel = document.querySelector(`[data-id="${idOrder}"]`).closest('td').previousElementSibling;
                statusLabel.innerHTML = `<span class="label label-warning">${newStatus}</span>`;
            } else {
                console.error('Cập nhật thất bại:', data.message);
            }
        })
        .catch(error => console.error('Đã có lỗi xảy ra:', error));
}




// xử lý view mai làm tiếp
function getViewItems() {
    document.getElementById('js-preview-view').addEventListener('click', function (event) {
        event.preventDefault();

        fetch(`api/get-orders/${data-id}`).then(response => response.json())
            .then(data => {
                const dashboard = document.getElementById('list_item');
                dashboard.innerHTML = '';
                if (data.data.length > 0) {
                    data.data.forEach(item => {
                        console.log(item);
                        const row = `<tr>
                                        <th style="width: 30%">Thuộc Tính</th>
                                        <th>Giá Trị</th>
                                    </tr>
                                    <tr>
                                        <td>${item.order.customer.name}</td>
                                        <td><span >Yes sir</span></td>
                                    </tr>
                                    <tr>
                                        <td>Email KH</td>
                                        <td><span ></span></td>
                                    </tr>
                                    <tr>
                                        <td>Phone KH</td>
                                        <td><span ></span></td>
                                    </tr>
                                    <tr>
                                        <td>Địa Chỉ KH</td>
                                        <td><span ></span></td>
                                    </tr>`
                        dashboard.innerHTML += row;
                    });
                } else {
                    dashboard.innerHTML = '<tr><td colspan="7">Không có đơn hàng</td></tr>';
                }

            }).catch(error => console.error('Đã có lỗi xảy ra', error));
    });

}



// @comment lại
// viêt sự kiện xem toàn bộ đơn hàng
// document.getElementById('btn-all-item').addEventListener('click', function (event) {
//     event.preventDefault();
//     fetch(`api/dashboard`).then(response => response.json())
//         .then(data => {
//             const dashboard = document.getElementById('content-area');
//             dashboard.innerHTML = '';
//             if (data.data.length > 0) {
//                 data.data.forEach(item => {
//                     const formatMoney = new Intl.NumberFormat('vi-VN', {
//                         style: 'currency',
//                         currency: 'VND'
//                     }).format(item.price);
//                     const row = `
//                                 <tr>
//                                  <td>100</td>
//                                     <td>
//                                         <ul>
//                                             <li>Name: ${item.order.customer ? item.order.customer.name : 'N/A'}</li>
//                                             <li>Email: ${item.order.customer ? item.order.customer.email : 'N/A'}</li>
//                                             <li>Phone: ${item.order.customer ? item.order.customer.phone : 'N/A'}</li>
//                                             <li>Address: ${item.order.customer ? item.order.customer.address : 'N/A'}</li>
//                                         </ul>
//                                     </td>
//                                     <td>${formatMoney}</td>
//                                     <td>
//                                         <span class="label label-warning" style="cursor: default; pointer-events: none;">
//                                            ${item.status}
//                                         </span>
//                                     </td>
//                                     <td>
//                             <span class="label label-info" style="cursor: default; pointer-events: none;">
//                             ${item.order.payment.payment_method}
//                             </span>
//                             </td>
//                             <td>${moment(item.created_at).format("DD/MM/YYYY")}</td>
//                                     <td>
//                                        <a href="" class="btn btn-xs btn-info js-preview-view" data-id="${item.id_order_item}">
//                                         <i class="fa fa-eye"></i> View  </a>
//                                         <div class="btn-group">
//                                             <button type="button" class="btn btn-success btn-xs">Action</button>
//                                             <button type="button" class="btn btn-success btn-xs dropdown-toggle"
//                                                 data-toggle="dropdown" aria-expanded="false">
//                                                 <span class="caret"></span>
//                                                 <span class="sr-only">Toggle Dropdown</span>
//                                             </button>
//                                             <ul class="dropdown-menu">
//                                                 <li>
//                                                     <a href="" class=""><i class="fa fa-trash js-delete-confirm"
//                                                             onclick="return confirm('Bạn chắc chắn là xoá chứ')"></i>Delete</a>
//                                                 </li>
//                                                 <li class="divider"></li>
//                                                 <li><a href=""><i class="fa fa-ban"> Đang Vận Chuyển</i></a></li>
//                                                 <li><a href=""><i class="fa fa-ban"> Đã Bàn Giao</i></a></li>
//                                                 <li><a href=""><i class="fa fa-ban"> Hủy</i></a></li>
//                                             </ul>
//                                         </div>
//                                     </td>
//                                 </tr>`;
//                     dashboard.innerHTML += row;
//                 });
//             } else {
//                 dashboard.innerHTML = '<tr><td colspan="7">Không có đơn hàng</td></tr>';
//             }

//         }).catch(error => console.error('Đã có lỗi xảy ra', error));

// });
