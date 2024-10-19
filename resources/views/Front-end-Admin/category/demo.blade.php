<!-- resources/views/category/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Category</title>
</head>
<body>

    <h1>Danh sách Category</h1>
    <ul id="category-list">
        <!-- Dữ liệu category sẽ được hiển thị tại đây -->
    </ul>

    <script>
        // Gọi API để lấy danh sách category khi trang load
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/category')  // Gọi API từ Laravel để lấy danh sách category
                .then(response => response.json())  // Chuyển đổi phản hồi thành JSON
                .then(categories => {
                    const categoryList = document.getElementById('category-list');
                    categoryList.innerHTML = '';  // Xóa nội dung cũ nếu có

                    // Lặp qua danh sách categories và thêm vào giao diện
                    categories.forEach(category => {
                        const li = document.createElement('li');
                        li.textContent = `Tên: ${category.name} - Mô tả: ${category.describe}`;
                        categoryList.appendChild(li);
                    });
                })
                .catch(error => {
                    console.error('Lỗi khi lấy dữ liệu:', error);
                });
        });
    </script>

</body>
</html>

