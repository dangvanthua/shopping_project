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

                    //thực thi sự kiện xoá
                    const deleteItems = row.querySelector('.js-delete-confirm');
                    deleteItems.addEventListener('click',function(event){
                        event.preventDefault();
                        const data_id = this.getAttribute('data-id');
                        deleteItemsRating(data_id);
                    })
                });
            })
            .catch(error => console.error('Đã có lỗi xảy ra:', error));
    }

    //@viết sự kiện cho hàm xoá
    function deleteItemsRating(id_rating)
    {
        if(confirm("Bạn có muốn xoá không?"))
        {
            fetch(`api/delete-admin-rating/${id_rating}`,{
                method: "DELETE",
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data =>{
                if(data.message == "Xoá dữ liệu thành công")
                {
                    showAllItemsRating();
                    alert("Bạn đã xoá dữ liệu thành công");
                }
                else{
                    alert("Đã có lỗi khi xoá");
                    console.error('Đã có lỗi khi xoá');
    
                }
            })
            .catch(error => console.error('Đã có lỗi xảy ra',error));
        }
    }


    // Gọi hàm hiển thị khi trang được tải
    showAllItemsRating();
});
