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
            <label for="title">Tiêu đề sách</label>
            <input type="text" id="title" name="title" value="Tiêu đề hiện tại" required>
            
            <label for="publishedYear">Năm xuất bản</label>
            <input type="number" id="publishedYear" name="publishedYear" value="2023" required>
            
            <label for="genre">Thể loại</label>
            <select id="genre" name="genre">
                <option value="Tiểu thuyết" selected>Tiểu thuyết</option>
                <option value="Khoa học">Khoa học</option>
                <option value="Lịch sử">Lịch sử</option>
            </select>
            
            <button type="submit">Cập nhật</button>
        </form>
    </div>
</body>
</html>
