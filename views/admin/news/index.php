<!-- 
<?php
require_once "../../../models/News.php"; // Đảm bảo đường dẫn chính xác tới model News

// Khởi tạo đối tượng News
$newsModel = new News();
$news = $newsModel->getAll(); // Lấy danh sách tin tức

?> -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách Tin tức</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
        }

        a:hover {
            text-decoration: underline;
        }

        .table-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .add-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
            color: #333;
        }

        table tr:hover {
            background-color: #f9f9f9;
        }

        img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>Danh sách Tin tức</h1>
    <a href="add.php" class="add-button">Thêm Tin tức</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Hình ảnh</th>
                <th>Thể loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($news)): ?>
                <?php foreach ($news as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['title'] ?></td>
                        <td><?= $item['content'] ?></td>
                        <td>
                            <?php if (!empty($item['image'])): ?>
                                <img src="../../../uploads/<?= htmlspecialchars(basename($item['image'])) ?>" alt="Hình ảnh" style="max-width: 100px; height: auto;">
                                
                                <?php else: ?>
                                Không có ảnh
                            <?php endif; ?>
                          
                        </td>

                        <td><?= $item['category_name'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $item['id'] ?>">Sửa</a>
                            <a href="index.php?action=delete&id=<?= $item['id'] ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                        </td>
                    </tr>

                    <?php
                        
                            ?>
                <?php endforeach; ?>
                <!-- <?php else: ?>
                <tr>
                    <td colspan="6">Không có tin tức nào.</td>
                </tr>
            <?php endif; ?> -->
        </tbody>
    </table>
</body>

</html>