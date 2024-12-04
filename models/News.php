<?php

require_once "Database.php";

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

        return ($result->num_rows > 0) ? $result->fetch_all(mode: MYSQLI_ASSOC) : [];
    }

    // Thêm tin tức mới
    public function insert($title, $content, $image, $category_id) {
        $query = "INSERT INTO news (title, content, image, created_at, category_id) VALUES (?, ?, ?, NOW(), ?)";
        $stmt = $this->db->prepare($query);

        if ($stmt === false) {
            die("Prepare failed: " . $this->db->error); // Kiểm tra lỗi khi chuẩn bị câu truy vấn
        }

        // Cập nhật số lượng biến trong bind_param
        $stmt->bind_param("sssi", $title, $content, $image, $category_id);
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error); // Kiểm tra lỗi khi thực hiện câu truy vấn
        }

        return true;
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE id = ?");
        
        if ($stmt === false) {
            die("Prepare failed: " . $this->db->error);
        }

        // Binds the parameter to the SQL query
        $stmt->bind_param("i", $id); // 'i' for integer
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // fetch_assoc() để lấy dữ liệu dưới dạng mảng liên kết
    }
}
?>
