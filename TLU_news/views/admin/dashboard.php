<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điều Khiển Quản Trị</title>
    <link rel="stylesheet" href="#">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        nav {
            background-color: #444;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav a {
            margin: 0 15px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            color: #333;
            font-size: 24px;
        }

        .card p {
            font-size: 18px;
            color: #555;
        }

        .row {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .col {
            flex: 1;
            min-width: 300px;
            max-width: 45%;
        }

        .btn-add {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>

</head>

<body>
<header>
    <h1>Bảng Điều Khiển Quản Trị</h1>
</header>

<nav>
    <a href="/views/admin/dashboard.php">Trang chủ</a>
    <a href="/admin/news">Tin tức</a>
    <a href="#">Quản lý người dùng</a>
    <a href="#">Cài đặt</a>
    <a href="index.php?url=admin/logout">Đăng xuất</a>
</nav>

<div class="container">
    <h2>Chào mừng, Quản trị viên</h2>

    <div class="row">
        <!-- Thống kê số lượng bài viết -->
        <div class="col">
            <div class="card">
                <h3>Số lượng Tin Tức</h3>
                <p>100 bài viết</p>
            </div>
        </div>

        <!-- Thống kê số lượng người dùng -->
        <div class="col">
            <div class="card">
                <h3>Số lượng Người Dùng</h3>
                <p>500 người dùng</p>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Thống kê số lượng bài viết chờ duyệt -->
        <div class="col">
            <div class="card">
                <h3>Bài Viết Chờ Duyệt</h3>
                <p>5 bài viết</p>
            </div>
        </div>

        <!-- Thống kê số lượng bình luận -->
        <div class="col">
            <div class="card">
                <h3>Số Bình Luận</h3>
                <p>120 bình luận</p>
            </div>
        </div>
    </div>

    <!-- Nút thêm tin tức mới -->
    <a href="/views/admin/news/add.php" class="btn-add">Thêm Tin Tức Mới</a>

</div>

<footer>
    <p>&copy; 2024 Trang web Quản trị Tin Tức - Tất cả quyền được bảo lưu.</p>
</footer>
</body>

</html>