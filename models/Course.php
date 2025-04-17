<?php
require_once "config/database.php";

class Course {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM course");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM course WHERE courseId = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($courseId, $courseName, $categoryId, $image) {
        $stmt = $this->conn->prepare("INSERT INTO course (courseId, courseName, categoryId, image) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$courseId, $courseName, $categoryId, $image]);
    }
    
    public function update($courseId, $courseName, $categoryId, $image) {
        $stmt = $this->conn->prepare("UPDATE course SET courseName = ?, categoryId = ?, image = ? WHERE courseId = ?");
        return $stmt->execute([$courseName, $categoryId, $image, $courseId]);
    }
    
    // Phương thức kiểm tra xem có người dùng đã đăng ký khóa học không
    public function hasUsers($courseId) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM user_courses WHERE course_id = ?");
        $stmt->execute([$courseId]);
        return $stmt->fetchColumn() > 0;
    }

    public function delete($id) {
        // Kiểm tra nếu khóa học có người dùng đăng ký
        if ($this->hasUsers($id)) {
            return false; // Không thể xóa khóa học nếu có người đăng ký
        }

        $stmt = $this->conn->prepare("DELETE FROM course WHERE courseId = ?");
        return $stmt->execute([$id]);
    }

    public function registerUser($user_id, $course_id) {
        // Kiểm tra xem người dùng đã đăng ký khóa học này chưa
        $check = $this->conn->prepare("SELECT * FROM user_courses WHERE user_id = ? AND course_id = ?");
        $check->execute([$user_id, $course_id]);
    
        if ($check->rowCount() > 0) {
            return 'already_registered';
        }
    
        // Nếu chưa đăng ký thì tiến hành đăng ký
        $stmt = $this->conn->prepare("INSERT INTO user_courses (user_id, course_id) VALUES (?, ?)");
        if ($stmt->execute([$user_id, $course_id])) {
            return 'success';
        }
    
        return 'error';
    }

    public function getRegisteredCourses($user_id) {
        $stmt = $this->conn->prepare("
            SELECT c.* 
            FROM course c
            JOIN user_courses uc ON c.courseId = uc.course_id
            WHERE uc.user_id = ?
        ");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function unregisterUser($user_id, $course_id) {
        $stmt = $this->conn->prepare("DELETE FROM user_courses WHERE user_id = ? AND course_id = ?");
        return $stmt->execute([$user_id, $course_id]);
    }

    public function countCourses() {
        $sql = "SELECT COUNT(*) as total FROM course";
        $stmt = $this->conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
    
    public function getCoursesWithLimit($limit, $offset) {
        $sql = "SELECT * FROM course LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
