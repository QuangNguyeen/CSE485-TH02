<?php
require_once 'config.php';

class User {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
        }
    }

    // Kiểm tra thông tin đăng nhập
    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username AND role = 1");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        // So sánh mật khẩu trực tiếp
        if ($user && $user['password'] === $password) {
            return $user; // Trả về thông tin người dùng nếu đúng
        }
        return false; // Sai thông tin
    }

}
