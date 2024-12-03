<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tin tức</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Thêm Tin Tức Mới</h1>
        <form action="add.php" method="POST" enctype="multipart/form-data">
            <!-- Tiêu đề -->
            <label for="title">Tiêu đề</label>
            <input type="text" id="title" name="title" placeholder="Nhập tiêu đề tin tức" required>

            <!-- Nội dung -->
            <label for="content">Nội dung</label>
            <textarea id="content" name="content" rows="5" placeholder="Nhập nội dung tin tức" required></textarea>

            <!-- Hình ảnh -->
            <label for="image">Hình ảnh</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <!-- Ngày tạo -->
            <label for="created_at">Ngày tạo</label>
            <input type="datetime-local" id="created_at" name="created_at" required>

            <!-- Thể loại -->
            <label for="category_id">Thể loại</label>
            <select id="category_id" name="category_id" required>
                <option value="">-- Chọn thể loại --</option>
                <!-- Thêm các tùy chọn thể loại từ cơ sở dữ liệu -->
                <option value="1">Thể thao</option>
                <option value="2">Giải trí</option>
                <option value="3">Thời sự</option>
            </select>

            <button type="submit">Thêm tin tức</button>
        </form>
    </div>
</body>
</html>
