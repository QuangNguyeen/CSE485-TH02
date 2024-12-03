<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sách</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Danh sách sách</h1>
        <a href="add.php" class="add-button">Thêm sách mới</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Năm xuất bản</th>
                    <th>Thể loại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Đắc Nhân Tâm</td>
                    <td>1936</td>
                    <td>Kỹ năng sống</td>
                    <td class="action-buttons">
                        <a href="edit.php?id=1" class="edit">Sửa</a>
                        <a href="delete.php?id=1" class="delete">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Harry Potter</td>
                    <td>1997</td>
                    <td>Tiểu thuyết</td>
                    <td class="action-buttons">
                        <a href="edit.php?id=2" class="edit">Sửa</a>
                        <a href="delete.php?id=2" class="delete">Xóa</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
