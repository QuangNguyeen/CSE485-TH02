<?php
define('DB_HOST', '127.0.0.1'); // Hoặc 'localhost'
define('DB_USER', 'root');      // Tên người dùng mặc định của Laragon
define('DB_PASS', '');          // Mật khẩu (để trống nếu không có)
define('DB_NAME', 'tintuc');    // Tên cơ sở dữ liệu

// Kết nối MySQL
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
