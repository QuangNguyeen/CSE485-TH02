<?php
require_once './controllers/AdminController.php';

$controller = new AdminController();

// Lấy phần đường dẫn từ URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Chuyển hướng đến phương thức tương ứng trong controller
switch ($action) {
    case 'create':
        $controller->create();
        break;
    default:
        $controller->index();
        break;
}
?>
