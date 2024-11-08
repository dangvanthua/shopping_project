document.addEventListener('DOMContentLoaded', function () {
    // Hàm hiển thị giao diện rating
    function showAllItemsRating() {
        fetch(`/api/admin-rating`)
            .then(response => response.json())
            .then(data => {
                const getElement = document.querySelector('.get-items-rating');
                getElement.innerHTML = '';
                // Lặp qua dữ liệu API và tạo hàng mới trong bảng
                data.data.data.forEach((items, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${items.product.name}</td>
                        <td>${items.customer.name}</td>
                        <td>${items.created_at}</td>
                        <td>${items.comment}</td>

                        <td>
                            <a href="#" data-id="${items.id}">${items.status === 'active' ? 'Active' : 'Hide'}</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-xs btn-info js-preview-rating" data-id="${items.id_review}">
                                <i class="fa fa-eye"></i> View
                            </a>
                            <a href="" class="btn btn-xs btn-danger js-delete-confirm" data-id="${items.id_review}">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>`;
                    getElement.appendChild(row);
                });
            })
            .catch(error => console.error('Đã có lỗi xảy ra:', error));
    }

    // Gọi hàm hiển thị khi trang được tải
    showAllItemsRating();
});
