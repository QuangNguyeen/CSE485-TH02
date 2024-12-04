<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sách</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sửa thông tin sách</h1>
        <form action="edit.php" method="POST">
            <label for="title">Tiêu đề bài báo</label>
            <input type="text" id="title" name="title" value="Tiêu đề hiện tại" required>
            
            <label for="content">Nội dung:</label>
            <textarea name="content" required></textarea>
            
            <label for="image">Hình ảnh:</label>
            <input type="file" name="image" required>
            <label for="category_id">ID Danh mục:</label>
            <input type="number" name="category_id" required>
            
            <button type="submit">Cập nhật</button>
        </form>
    </div>
</body>
</html>
