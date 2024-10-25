let currentPage = 1;
let currentCategoryId = 0;

document.addEventListener('DOMContentLoaded', function () {
    console.log('Home js');

    const filterButtons = document.querySelectorAll('.filter-tope-group button');

    if (filterButtons.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                currentCategoryId = button.dataset.filter;
                currentPage = 1;

                loadProducts(currentCategoryId, currentPage);
            });
        });
    }

    // Load thêm sản phẩm khi nhấn nút "Load More"
    document.querySelector('#load-more-button').addEventListener('click', function () {
        currentPage++;
        loadProducts(currentCategoryId, currentPage);
    });

    function loadProducts(categoryId, page) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const loadMoreBtn = document.querySelector('#load-more-button');

        if (!loadMoreBtn) return;

        fetch('/load-more/products', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ category_id: categoryId, page: page })
        })
            .then(response => response.json())
            .then(data => {
                const products = data.products;
                const total = data.total;

                // Xóa các sản phẩm cũ nếu là trang đầu tiên (chuyển danh mục)
                if (page === 1) {
                    document.querySelector('.product-grid').innerHTML = '';
                }

                renderProducts(products);

                console.log(total, page);
                if (total <= page * 8) {
                    loadMoreBtn.classList.add('d-none');
                    loadMoreBtn.classList.remove('d-flex');
                } else {
                    loadMoreBtn.classList.add('d-flex');
                    loadMoreBtn.classList.remove('d-none');
                }
            })
            .catch(error => console.log('Error', error));
    }


    function renderProducts(products) {
        const productContainer = document.querySelector('.product-grid');
        if (!productContainer) return;

        productContainer.innerHTML = '';

        products.forEach(product => {
            const productCard = `
              <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 product-item watches">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="${product.images}">
                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                ${product.name}
                            </a>

                            <span class="stext-105 cl3">
                                ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(product.price)}
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <i class="fa fa-heart text-secondary"></i> <!-- Sử dụng Bootstrap để đổi màu -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `;
            productContainer.innerHTML += productCard;
        });
    }
});
