<?php
require_once "config/database.php";
require_once "models/Course.php";

class User
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function register($username, $password, $email, $role, $birthyear, $gender, $avatar)
    {
        $sql = "INSERT INTO users (username, password, email, role, birthyear, gender, avatar)
                VALUES (:username, :password, :email, :role, :birthyear, :gender, :avatar)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':username' => $username,
            ':password' => $password,
            ':email' => $email,
            ':role' => $role,
            ':birthyear' => $birthyear,
            ':gender' => $gender,
            ':avatar' => $avatar
        ]);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserCourses()
    {
        $sql = "
        SELECT users.*, 
               GROUP_CONCAT(course.courseName SEPARATOR ', ') AS courses
        FROM users
        LEFT JOIN user_courses ON users.id = user_courses.user_id
        LEFT JOIN course ON user_courses.course_id = course.courseId
        GROUP BY users.id
    ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countUsers() {
        $sql = "SELECT COUNT(*) as total FROM users";
        $stmt = $this->conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
    
    public function getUsersWithLimit($limit, $offset) {
        $sql = "SELECT * FROM users LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isEmailExists($email)
    {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() ? true : false;
    }

    public function update($id, $data)
    {
        $sql = "UPDATE users SET username = :username, email = :email, role = :role, birthyear = :birthyear, gender = :gender, avatar = :avatar
                WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        // Xóa các khóa học đã đăng ký trước
        $sqlDeleteCourses = "DELETE FROM user_courses WHERE user_id = :id";
        $stmtCourses = $this->conn->prepare($sqlDeleteCourses);
        $stmtCourses->bindParam(':id', $id);
        $stmtCourses->execute();

        // Sau đó mới xóa user
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}
