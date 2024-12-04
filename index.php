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

    case 'show':
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $controller->show($id);
        } else {
            echo "ID không hợp lệ.";
            exit;
        }
        break;
    default:
        $controller->index();
        break;
}
?>
