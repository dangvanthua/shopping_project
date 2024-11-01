document.addEventListener('DOMContentLoaded', function () {
    function displayCartItems(items) {
        let itemsShoppingCart = document.getElementById('items-shoppingcart');
        itemsShoppingCart.innerHTML ='';
        items.forEach( data => {
            const row = `
                <tr class="table_row">
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="images/item-cart-04.jpg" alt="IMG">
                        </div>
                    </td>
                    <td class="column-2">${data.product_name}</td>
                    <td class="column-3">${data.price.toLocaleString()} VND</td>
                    <td class="column-4">
                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-minus"></i>
                            </div>
                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="${data.quantity}">
                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-plus"></i>
                            </div>
                        </div>
                    </td>
                    <td class="column-5">${data.total_price.toLocaleString()} VND</td>
                </tr>
            `;
            itemsShoppingCart.insertAdjacentHTML('beforeend',row);
        });
    }

    function showFetchAllItems() {
        fetch('/get/cart', {
                method: "GET",
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    displayCartItems(data);
                } else {
                    alert("Bạn chưa có sản phẩm nào trong giỏ hàng");
                    console.log("Không có giá trị trong giỏ hàng");
                }
            }).catch(error => console.error('Đã có lỗi xảy ra', error));
    }
    showFetchAllItems()
});
