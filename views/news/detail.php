 <?php
        // Kết nối đến cơ sở dữ liệu và lấy nội dung bài báo
        require_once "../../models/News.php"; // Đảm bảo đường dẫn đúng tới model News

      //  Lấy ID từ tham số URL
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id']; // Chuyển đổi sang kiểu số nguyên
        } else {
            header("Location: index.php"); // Chuyển hướng nếu không có ID
            exit();
        }

        // Khởi tạo đối tượng News và lấy nội dung bài báo theo ID
        $newsModel = new News();
        $article = $newsModel->getById($id); // Phương thức để lấy bài báo theo ID

        if (!$article) {
            echo "<h1>Bài báo không tồn tại.</h1>";
            exit();
        }
        ?> 

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chi Tiết</title>
    <style>
        /* Thêm CSS để định dạng giao diện */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .image-container {
            position: relative;
            height: 300px;
        }
        .image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
        }
    </style>
</head>
<body>
<div class="container">   
    
            <div class="image-container">
                <img src="../../uploads/<?= htmlspecialchars(basename($article['image'])) ?>" alt="Hình ảnh bài báo" class="image">
            </div>

            <h1><?= htmlspecialchars($article['title']) ?></h1>
            <p><?= htmlspecialchars($article['content']) ?></p>
    
        
        <a href="index.php?action=index" class="btn btn-primary">Quay lại</a>
    </div>
</body>
</html>
