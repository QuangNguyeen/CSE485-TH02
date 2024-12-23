<?php
require_once __DIR__ . '/controllers/AdminController.php';
require_once __DIR__ . '/controllers/NewsController.php';
require_once __DIR__ . '/controllers/HomeController.php';

$controller = $_GET['controller'] ?? 'index';
$action = $_GET['action'] ?? 'index';

if ($controller && $action) {
    switch ($controller) {
        case 'admin':
            $adminController = new AdminController();
            if ($action === 'index') {
                $adminController->index();
            } elseif ($action === 'login') {
                $adminController->login();
            }
            break;

        case 'news':
            $newsController = new NewsController();
            if ($action === 'add') {
                $newsController->add();
            } elseif ($action === 'edit') {
                $newsController->edit();
            } elseif ($action === 'delete') {
                $newsController->delete();
            }
            break;
        default:
            $adminController = new AdminController();
            $adminController->index();
            break;
    }
}