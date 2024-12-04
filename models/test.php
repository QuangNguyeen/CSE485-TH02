<?php
require_once "Database.php"; // Đảm bảo bạn đã có tệp Database.php

class News {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    // Lấy tất cả tin tức
    public function getAll() {
        $query = "SELECT n.*, c.name AS category_name FROM news n LEFT JOIN categories c ON n.category_id = c.id";
        $result = $this->db->query($query);

        if (!$result) {
            die("Query Error: " . $this->db->error);
        }

        return ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}

// Khởi tạo đối tượng News và lấy danh sách tin tức
$newsModel = new News();
$newsList = $newsModel->getAll();

// In ra danh sách tin tức
if (!empty($newsList)) {
    echo "<h1>Danh sách Tin tức</h1>";
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Tiêu đề</th>";
    echo "<th>Nội dung</th>";
    echo "<th>Hình ảnh</th>";
    echo "<th>Thể loại</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($newsList as $item) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($item['id']) . "</td>";
        echo "<td>" . htmlspecialchars($item['title']) . "</td>";
        echo "<td>" . htmlspecialchars($item['content']) . "</td>";
        echo "<td><img src='" . htmlspecialchars($item['image']) . "' alt='Hình ảnh' style='max-width: 100px;'></td>";
        echo "<td>" . htmlspecialchars($item['category_name']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Không có tin tức nào.";
}
?>
