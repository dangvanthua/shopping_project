document.addEventListener('DOMContentLoaded', function () {
    fetch(`api/dashboard`)
        .then(response => response.json())
        .then(data => {
            let dashboard = document.getElementById('dashboard_list');
            dashboard.innerHTML = '';
            if (data.data.length > 0) {
                data.data.forEach(item => {
                    const row = `
                    <tr>
                        <td>${item.id_order}</td>
                        <td>${item.product ? item.product.name : 'Không có tên sản phẩm'}</td>
                        <td>${item.order ? item.order.shipping_address : 'Không có địa chỉ giao hàng'}</td>
                        <td>${item.status}</td>
                        <td>${item.price}</td>
                        <td>${item.created_at}</td>
                        <td>
                            <a href="" class="btn btn-xs btn-info js-preview-view"><i class="fa fa-eye"></i>View</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-xs">Action</button>
                                <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="" class=""><i class="fa fa-trash js-delete-confirm" onclick="return confirm('Bạn chắc chắn là xoá chứ')"></i> Delete</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href=""><i class="fa fa-ban"> Đang Vận Chuyển</i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-ban"> Đã Bàn Giao</i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-ban"> Hủy</i></a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>`;
                    dashboard.innerHTML += row;
                });
            } else {
                dashboard.innerHTML = '<tr><td colspan="7">Không có đơn hàng</td></tr>';
            }
        })
        .catch(error => console.error('Có lỗi xảy ra:', error));
});




//     document.addEventListener('DOMContentLoaded', function () {
//     function fetchItemDashboard() {
//         fetch(`api/dashboard`).then(response => response.json())
//             .then(data => {
//                 let dashboard = document.getElementById('dashboard_list');
//                 dashboard.innerHTML = '';
//                 if (data.data.length > 0) {
//                     data.data.forEach(item => {
//                         console.log(item);
//                         const row = `
//                     <tr>
//                         <td>${item.id_order}</td>
//                         <td>${item.id_product ? item.name : 'Không có tên sản phẩm'}</td>
//                         <td>${item.order ? item.order.shipping_address : 'Không có địa chỉ giao hàng'}</td>
//                         <td>${item.status}</td>
//                         <td>${item.price}</td>
//                         <td>${item.created_at}</td>
//                         <td>
//                                 <a href="" class="btn btn-xs btn-info js-preview-view"><i class="fa fa-eye"></i>View</a>
//                                 <div class="btn-group">
//                                     <button type="button" class="btn btn-success btn-xs">Action</button>
//                                     <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
//                                         <span class="caret"></span>
//                                          <span class="sr-only">Toggle Dropdown</span>
//                                      </button>
//                                      <ul class="dropdown-menu">
//                                         <li>
//                                             <a href="" class=""><i class="fa fa-trash js-delete-confirm" onclick="return confirm('Bạn chắc chắn là xoá chứ')"></i> Delete</a>
//                                         </li>
//                                         <li class="divider"></li>
//                                         <li>
//                                             <a href=""><i class="fa fa-ban"> Đang Vận Chuyển</i></a>
//                                          </li>
//                                         <li>
//                                             <a href=""><i class="fa fa-ban"> Đã Bàn Giao</i></a>
//                                         </li>
//                                         <li>
//                                             <a href=""><i class="fa fa-ban"> Hủy</i></a>
//                                         </li>
//                                     </ul>
//                                 </div>
//                             </td>
//                     </tr>`;
//                         dashboard.innerHTML += row;
//                     });
//                 } else {
//                     dashboard.innerHTML = '<tr><td colspan="7">Không có đơn hàng</td></tr>';
//                 }
//             }).catch(error => console.error('Có lỗi xảy ra:', error));
//     }
    
//     fetchItemDashboard(); // Gọi hàm khi trang được load

// });
