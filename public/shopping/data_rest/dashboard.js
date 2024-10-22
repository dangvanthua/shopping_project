document.addEventListener('DOMContentLoaded', function () {
    fetch(`api/dashboard`).then(response => response.json())
        .then(data => {
            let dashboard = document.getElementById('dashboard_list');
            dashboard.innerHTML = '';
            if (data.data.length > 0) {
                data.data.forEach(order => {
                    const row = `
                    <tr>
                        <td>${order.id}</td>
                        <td>${order.customer_name}</td>
                        <td>${order.price}</td>
                        <td>${order.status}</td>
                        <td>${order.payment_method}</td>
                        <td>${order.created_at}</td>
                        <td>
                            <a href="#" class="btn btn-xs btn-info">View</a>
                        </td>
                    </tr>`;
                    ordersList.innerHTML += row; // Thêm hàng vào bảng
                });
            } else {
                ordersList.innerHTML = '<tr><td colspan="7">Không có đơn hàng</td></tr>';
            }
        })
        .catch(error => console.error('Có lỗi xảy ra:', error));
});
