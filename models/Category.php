<?php
require_once 'config/database.php';

class Category {
    private $conn;

    public function __construct()
    {
        $database = Database::getInstance();
        $this->conn = $database->getConnection();
    }

    // Thêm phương thức getAll() để lấy tất cả danh mục
    public function getAll() {
        $sql = "SELECT * FROM category";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
