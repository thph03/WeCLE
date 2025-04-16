<?php
require_once 'models/Course.php';
require_once 'models/Category.php';
require_once 'models/RegistrationCourse.php';

// Bắt đầu session nếu chưa có
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class UserCourseController
{
    private $courseModel;

    public function __construct()
    {
        $this->courseModel = new Course();
    }

    // Hiển thị danh sách khóa học
    public function index()
    {
        $courses = $this->courseModel->getAll();

        // Lấy flash message nếu có
        $message = null;
        if (isset($_SESSION['flash_message'])) {
            $message = $_SESSION['flash_message'];
            unset($_SESSION['flash_message']);
        }

        include 'views/courses.php';
    }

    // Xử lý đăng ký khóa học
    public function register($courseId)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            $_SESSION['flash_message'] = "Vui lòng đăng nhập trước khi đăng ký khóa học.";
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        $userId = $_SESSION['user_id'];

        $result = $this->courseModel->registerUser($userId, $courseId);

        if ($result === 'success') {
            $_SESSION['flash_message'] = "✅ Đăng ký khóa học thành công!";
        } elseif ($result === 'already_registered') {
            $_SESSION['flash_message'] = "⚠️ Bạn đã đăng ký khóa học này rồi.";
        } else {
            $_SESSION['flash_message'] = "❌ Có lỗi xảy ra khi đăng ký khóa học.";
        }

        header("Location: index.php?controller=userCourse&action=index");
        exit;
    }

    public function registeredCourses() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $courses = $this->courseModel->getRegisteredCourses($user_id);

        require 'views/registered_courses.php';
    }


    public function unregister() {
        if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
            header("Location: index.php?controller=login");
            return;
        }
    
        $userId = $_SESSION['user_id'];
        $courseId = $_GET['id'];
    
        require_once 'models/Course.php';
        $courseModel = new Course();
    
        if ($courseModel->unregisterUser($userId, $courseId)) {
            $message = "Hủy đăng ký thành công.";
        } else {
            $message = "Có lỗi xảy ra khi hủy đăng ký.";
        }
    
        header("Location: index.php?controller=usercourse&action=registeredCourses&message=" . urlencode($message));
    }
    

}
