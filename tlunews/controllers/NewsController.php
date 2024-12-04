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
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $_FILES['image']['tmp_name'];
                $imageName = $_FILES['image']['name'];
                $imagePath = 'images/' . $imageName;
                if (move_uploaded_file($imageTmpPath, $imagePath)) {
                    $image = $imagePath;
                }
            }
            $news = new News($title, $content, $image, $createAt, $categoryId);
            $news->add();
            header("Location: views/admin/dashboard.php");
            exit();
        }
        include '../views/admin/news/add.php';
    }
    public function edit()
    {
        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $createdAt = $_POST['createAt'];
            $categoryId = intval($_POST['categoryId']);
            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $_FILES['image']['tmp_name'];
                $imageName = $_FILES['image']['name'];
                $imagePath = 'images/' . $imageName;
                if (move_uploaded_file($imageTmpPath, $imagePath)) {
                    $image = $imagePath;
                }
            }
            $news = new News();
            $editStatus = $news->edit($id, $title, $content, $createdAt, $categoryId, $image);
            if($editStatus){
                header('Location: views/admin/dashboard.php');
                exit;
            }else {
                die('Failed to update news!');
            }
        }else {
            die('Invalid request!');
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];

            $news = new News();
            $news->delete($id);

            header("Location: views/admin/dashboard.php");
            exit();
        }
        echo "Failed to delete news!";
    }
}
