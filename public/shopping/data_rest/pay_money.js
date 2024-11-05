
document.addEventListener('DOMContentLoaded',function()
{
    function showAllItemsPayMoney()
    {
        fetch(`/make-payment`).then(response => response.json())
        .then(data =>{
            const container = document.getElementById('cart-items-container');
            container.innerHTML = '';
            if(data.length > 0)
            {
                data.forEach(items => {
                    const row = `
            <div class="product-info">
                <img src="" alt="Product Image">
                <div class="ml-3">
                    <h6>${items.product_name}</h6>
                    <small>${items.color}</small>
                    <small>${items.size}</small>
                </div>
                <div class="text-right">
                    <span>119.000 đ</span>
                </div>
            </div>`;
            container.insertAdjacentHTML('beforeend',row);
                });
            }
            else{
                console.log('Không có giá trị nào cả');
            }
        }).catch(error => console.error('Đã có lỗi xảy ra',error));
    }
    showAllItemsPayMoney();
});

