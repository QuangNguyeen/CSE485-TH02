<?php
class AdminController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $admin = $userModel->login($username, $password);

            if ($admin) {
                session_start();
                $_SESSION['admin'] = $admin['username'];
                header('Location: index.php?url=admin/dashboard');
                exit;
            } else {
                $error = "Sai tên đăng nhập hoặc mật khẩu!";
            }
        }
        require_once "views/admin/login.php";
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?url=admin/login');
            exit;
        }
        require_once "views/admin/dashboard.php";
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?url=admin/login');
        exit;
    }
}
