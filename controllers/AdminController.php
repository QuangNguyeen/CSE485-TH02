<?php

require_once __DIR__ . '/../models/News.php';

class AdminController {
    private $newsModel;

    public function __construct() {
        $this->newsModel = new News();
    }

    // Hiển thị danh sách tin tức
    public function index() {
        $news = $this->newsModel->getAll();
        include __DIR__ . '/../views/admin/news/index.php';
    }

    // Hiển thị form và xử lý thêm tin tức
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $category_id = $_POST['category_id'] ?? 0;
    
            // Xử lý upload file ảnh
            $image = $_FILES['image']['name'] ?? '';
            if ($image) {
                $targetDir = "./uploads/";
                $fileName = time() . '-' . basename($_FILES['image']['name']);
                $targetFilePath = $targetDir . $fileName;
    
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    $imagePath = $targetFilePath; // Đường dẫn đầy đủ đến ảnh
                } else {
                    echo "Lỗi khi tải lên hình ảnh.";
                    exit;
                }
            } else {
                $imagePath = ""; // Trường hợp không có ảnh
            }
    
            // Thêm tin tức vào database
            if ($this->newsModel->insert($title, $content, $imagePath, $category_id)) {
                header("Location: ./views/admin/news/index.php"); // Quay lại trang danh sách
                exit;
            } else {
                echo "Lỗi khi thêm tin tức.";
            }
        }
    
        // Hiển thị form thêm tin tức
        include "../views/admin/news/add.php";
    }
    

    public function show($id) {
        $article = $this->newsModel->getById($id);

        if (!$article) {
            echo "<h1>Bài báo không tồn tại.</h1>";
            exit();
        }

        include "../views/news/detail/php";
    }
}
?>
