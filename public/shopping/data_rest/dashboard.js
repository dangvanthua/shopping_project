// @load dữ liệu cho đơn hàng

document.addEventListener('DOMContentLoaded', function () {
    function fetchItemDashboard() {
        // @lấy dữ liệu từ api
        fetch(`api/dashboard`).then(response => response.json())
            .then(data => {
                let dashboard = document.getElementById('dashboard_list');
                dashboard.innerHTML = '';
                console.log(dashboard.innerHTML);
                if (data.data.length > 0) {
                    data.data.forEach(item => {
                        // console.log(item);
                        const formatMoney = new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(item.price);
                        // @In danh sách
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
    }
    fetchItemDashboard(); // Gọi hàm khi trang được load
    getAllItems();

    // hiện thị chi tiết các sản phẩm

    function getAllItems() {
        fetch(`api/get-orders`).then(response => response.json())
            .then(data => {
                const dashboard = document.getElementById('list_item');
                dashboard.innerHTML = '';

                if (data.data.length > 0) {
                    data.data.forEach(item => {
                        const formatMoney = new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(item.price);
                        const row = `
                                    <tr>
                                     <td>1</td>
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
                                            <a href="" class="btn btn-xs btn-info js-preview-view"><i class="fa fa-eye"></i>View</a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-xs">Action</button>
                                                <button type="button" class="btn btn-success btn-xs dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="" class=""><i class="fa fa-trash js-delete-confirm"
                                                                onclick="return confirm('Bạn chắc chắn là xoá chứ')"></i>Delete</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href=""><i class="fa fa-ban"> Đang Vận Chuyển</i></a></li>
                                                    <li><a href=""><i class="fa fa-ban"> Đã Bàn Giao</i></a></li>
                                                    <li><a href=""><i class="fa fa-ban"> Hủy</i></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>`;
                        dashboard.innerHTML += row;
                    });
                } else {
                    dashboard.innerHTML = '<tr><td colspan="7">Không có đơn hàng</td></tr>';
                }

            }).catch(error => console.error('Đã có lỗi xảy ra', error));
    }
});



// xử lý view mai làm tiếp
// function getViewItems()
// {
//     document.getElementById('').addEventListener('click', function (event) {
//         event.preventDefault();

//         fetch(`api/view-orders`).then(response => response.json())
//         .then(data => {
//             const dashboard = Document.getElementById();
//         });
//     });
// }




// @comment lại
// viêt sự kiện xem toàn bộ đơn hàng
// document.getElementById('btn-all-item').addEventListener('click', function (event) {
//     event.preventDefault();
//     fetch(`api/get-orders`).then(response => response.json())
//         .then(data => {
//             const dashboard = document.getElementById('dashboard_list');
//             dashboard.innerHTML = '';

//             if (data.data.length > 0) {
//                 data.data.forEach(item => {
//                     console.log(item);
//                     const row = `
//                     <tr>
//                         <td>
//                             <ul>
//                                 <li>Name: ${item.order.customer ? item.order.customer.name : 'N/A'}</li>
//                                 <li>Email: ${item.order.customer ? item.order.customer.email : 'N/A'}</li>
//                                 <li>Phone: ${item.order.customer ? item.order.customer.phone : 'N/A'}</li>
//                                 <li>Address: ${item.order.customer ? item.order.customer.address : 'N/A'}</li>
//                             </ul>
//                         </td>
//                         <td>
//                             <span class="label label-warning" style="cursor: default; pointer-events: none;">
//                                 yes sir demo
//                             </span>
//                         </td>
//                         <td>đây là thanh toán</td>
//                         <td>${new Date(item.created_at).toLocaleDateString('vi-VN')}</td> <!-- Format ngày -->
//                         <td>
//                             <a href="" class="btn btn-xs btn-info js-preview-view"><i class="fa fa-eye"></i>View</a>
//                             <div class="btn-group">
//                                 <button type="button" class="btn btn-success btn-xs">Action</button>
//                                 <button type="button" class="btn btn-success btn-xs dropdown-toggle"
//                                     data-toggle="dropdown" aria-expanded="false">
//                                     <span class="caret"></span>
//                                     <span class="sr-only">Toggle Dropdown</span>
//                                 </button>
//                                 <ul class="dropdown-menu">
//                                     <li>
//                                         <a href="" class=""><i class="fa fa-trash js-delete-confirm"
//                                                 onclick="return confirm('Bạn chắc chắn là xoá chứ')"></i>Delete</a>
//                                     </li>
//                                     <li class="divider"></li>
//                                     <li><a href=""><i class="fa fa-ban"> Đang Vận Chuyển</i></a></li>
//                                     <li><a href=""><i class="fa fa-ban"> Đã Bàn Giao</i></a></li>
//                                     <li><a href=""><i class="fa fa-ban"> Hủy</i></a></li>
//                                 </ul>
//                             </div>
//                         </td>
//                     </tr>`;
//                     dashboard.innerHTML += row;
//                 });
//             } else {
//                 console.log("Don't have data to show");
//             }
//         }).catch(error => console.error('Đã có lỗi xảy ra', error));
// });
