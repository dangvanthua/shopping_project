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
function getAllItems() { // Gọi API để lấy danh sách đơn hàng
    const item_dashboard = document.getElementById('list_item');
    if (!item_dashboard) {
        console.error('Không tìm thấy phần tử list_item');
        return;
    }
    fetch(`api/get-orders`)
        .then(response => response.json())
        .then(data => {
            //console.log(data);
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

                //@ thao tác sự kiện nhấn vào button view
                document.querySelectorAll('.js-preview-view').forEach(button => {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        const value_id = this.getAttribute('data-id');
                        //@gọi hàm xem chi tiết
                        getViewItems(value_id);
                        // window.location.href = `/view-dashboard/${value_id}`;
                    })
                })


                // Gắn sự kiện cập nhật trạng thái cho các nút
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


//     function getViewItems(data_id) {
//     fetch(`api/view-dashboard/${data_id}`).then(response => response.json())
//         .then(data => {
//             console.log(data); // Kiểm tra cấu trúc của data trong console
//             const dashboard = document.getElementById('list_demo');
//             dashboard.innerHTML = ''; // Xóa nội dung cũ
//             if (data) {
//                 const item = data; // Nếu trả về đối tượng
//                 const row = `
//                      <section class="content-header">
//         <h1>
//       View Detai Transaction
//     </h1>
//     <ol class="breadcrumb">
//       <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
//       <li><a href="">Transaction</a></li>
//       <li class="active">Edit</li>
//     </ol>
//   </section>
//   <!-- Main content -->
//   <section class="content">
//     <div class="row">
//         <div class="col-md-6">
//             <div class="box box-primary">
//                 <div class="box-header">
//                     <h3 class="box-title">Thông Tin Khách Hàng</h3>
//                 </div>
//                 <div class="box-body no-padding">
//                     <table class="table table-striped">
//                         <tbody>
//                             <tr>
//                                 <td>Tên KH</td>
//                                 <td>Cao Anh Vũ</td>
//                             </tr>
//                             <tr>
//                                 <td>Email KH</td>
//                                 <td>Demo@gmail.com</td>
//                             </tr>
//                             <tr>
//                                 <td>Phone KH</td>
//                                 <td>09999999</td>
//                             </tr>
//                             <tr>
//                                 <td>Địa Chỉ KH</td>
//                                 <td>Hà Lội</td>
//                             </tr>
//                         </tbody>
//                     </table>
//                 </div>
//             </div>
//         </div>

//         <div class="col-md-6">
//             <div class="box box-danger">
//                 <div class="box-header">
//                     <h3 class="box-title">Thông Tin Thêm Về Đơn Hàng</h3>
//                 </div>
//                 <div class="box-body no-padding">
//                     <table class="table table-striped">
//                         <tbody>
//                             <tr>
//                                 <td>Trạng Thái</td>
//                                 <td></td>
//                             </tr>
//                             <tr>
//                                 <td>Tổng Tiền Đơn Hàng</td>
//                                 <td>VND</td>
//                             </tr>
//                             <tr>
//                                 <td>Ngày Mua Đơn Hàng</td>
//                                 <td></td>
//                             </tr>
//                         </tbody>
//                     </table>
//                 </div>
//             </div>
//         </div>
//     </div>
// </section>`;
//                 dashboard.innerHTML += row; // Thêm dữ liệu vào bảng
//             } else {
//                 dashboard.innerHTML = '<tr><td colspan="2">Không có dữ liệu</td></tr>';
//             }
//         }).catch(error => console.error('Đã có lỗi xảy ra:', error));
// }

//@thực thi viết hàm lấy chi tiết đơn hàng
function getViewItems(data_id) {
    fetch(`/api/view-dashboard/${data_id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data.customer.name);

            // Cập nhật thông tin vào giao diện mà không cần reload lại trang
            document.getElementById('customer_name').textContent = data.customer.name || 'N/A';
            document.getElementById('customer_email').textContent = data.customer.email || 'N/A';
            document.getElementById('customer_phone').textContent = data.customer.phone || 'N/A';
            document.getElementById('customer_address').textContent = data.customer.address || 'N/A';

            // Nếu cần cập nhật thêm thông tin về đơn hàng
            document.getElementById('order_status').textContent = data.status || 'N/A';
            document.getElementById('order_total').textContent = data.total ? `${data.total} VND` : 'N/A';
            document.getElementById('order_date').textContent = data.created_at || 'N/A';
        })
        .catch(error => console.error('Đã có lỗi xảy ra:', error));
}




