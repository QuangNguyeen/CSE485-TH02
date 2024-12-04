<?php
require_once(__DIR__ . '/../models/News.php');
class NewsController{
    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'] ?? '';
            $createAt = $_POST['createAt'] ?? '';
            $categoryId = $_POST['categoryId'] ?? '';

            $news = new News($title, $content, $image, $createAt, $categoryId);

            header("Location: views/admin/dashboard.php");
            exit();
        }
    }
}
