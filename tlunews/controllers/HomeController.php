<?php
require_once __DIR__ . '/../models/News.php';
class HomeController{
    public function getDetail()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $news = new News();
            $newsDetail = $news->getByID($id);
            return $newsDetail;
        }else{
            header('Location: index.php');
            exit();
        }
    }
}
