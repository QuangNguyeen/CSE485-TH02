<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Tin tức</title>
</head>
<body>
    <h1>Thêm Tin tức</h1>
    <form method="POST" action="../../../index.php?action=create" enctype="multipart/form-data">
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" required>
        <br>
        <label for="content">Nội dung:</label>
        <textarea name="content" required></textarea>
        <br>
        <label for="image">Hình ảnh:</label>
        <input type="file" name="image" required>
        <br>
        <label for="category_id">ID Danh mục:</label>
        <input type="number" name="category_id" required>
        <br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
