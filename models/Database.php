<?php

class Database {
    private $host = "localhost"; // Thay đổi nếu cần
    private $user = "root"; // Thay đổi nếu cần
    private $password = "123456"; // Thay đổi nếu cần
    private $dbname = "tintuc"; // Thay đổi tên cơ sở dữ liệu của bạn

    public function connect() {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>
