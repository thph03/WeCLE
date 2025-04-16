<?php
require_once 'config/database.php';

class Registration {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    // Kiểm tra xem người dùng đã đăng ký khóa học chưa
    public function isRegistered($userId, $courseId) {
        $stmt = $this->conn->prepare("SELECT * FROM registrations WHERE userId = ? AND courseId = ?");
        $stmt->execute([$userId, $courseId]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    // Đăng ký khóa học cho người dùng
    public function register($userId, $courseId) {
        $stmt = $this->conn->prepare("INSERT INTO registrations (userId, courseId) VALUES (?, ?)");
        return $stmt->execute([$userId, $courseId]);
    }
}
