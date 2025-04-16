<?php
require_once "models/Course.php";
require_once 'models/Category.php';
require_once 'config/database.php';
require_once 'models/Users.php';

class AdminController
{
    private $courseModel;

    public function __construct()
    {
        $this->courseModel = new Course();
    }

    public function index()
    {
        //AuthMiddleware::adminOnly();
        $courses = $this->courseModel->getAll();
        require "views/admin/course/index.php";
    }

    public function add()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseId = $_POST['courseId'];
            $courseName = $_POST['courseName'];
            $categoryId = $_POST['categoryId'];

            // Xử lý hình ảnh nếu có
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $imageName = time() . '_' . basename($_FILES['image']['name']);
                $uploadDir = 'public/uploads/';
                $uploadPath = $uploadDir . $imageName;

                // Upload file
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                    $image = $imageName;
                }
            }

            // Thêm khóa học vào cơ sở dữ liệu
            $courseModel = new Course();
            if ($courseModel->add($courseId, $courseName, $categoryId, $image)) {
                header('Location: index.php?controller=admin&action=index');
                exit;
            } else {
                echo "Lỗi khi thêm khóa học!";
            }
        }

        require 'views/admin/course/add.php';
    }

    public function edit()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        if (isset($_GET['id'])) {
            $courseId = $_GET['id'];
            $courseModel = new Course();
            $course = $courseModel->getById($courseId);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $courseName = $_POST['courseName'];
                $categoryId = $_POST['categoryId'];

                // Xử lý hình ảnh nếu có
                $image = $_POST['current_image']; // Giữ hình ảnh cũ nếu không tải lên mới
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $imageName = time() . '_' . basename($_FILES['image']['name']);
                    $uploadDir = 'public/uploads/';
                    $uploadPath = $uploadDir . $imageName;

                    // Upload file
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                        $image = $imageName; // Cập nhật ảnh mới nếu tải lên thành công
                    }
                }

                // Cập nhật khóa học
                $courseModel->update($courseId, $courseName, $categoryId, $image);
                header('Location: index.php?controller=admin&action=index');
                exit;
            }

            require 'views/admin/course/edit.php';
        }
    }


    public function delete($id)
    {
        // Kiểm tra nếu khóa học có người đăng ký
        if (!$this->courseModel->delete($id)) {
            // Nếu không thể xóa vì có người đăng ký, hiển thị thông báo lỗi
            $message = "Không thể xóa khóa học này vì có người đã đăng ký.";
            $courses = $this->courseModel->getAll(); // Lấy lại danh sách khóa học
            require "views/admin/course/index.php"; // Hiển thị lại danh sách với thông báo lỗi
            exit;
        }

        // Nếu xóa thành công, điều hướng lại về danh sách khóa học
        header("Location: index.php?controller=admin&action=index");
        exit;
    }

    public function userList()
    {
        $userModel = new User();
        $users = $userModel->getUserCourses();

        include "views/admin/user/index.php";
    }

    public function userEdit($id)
    {
        $userModel = new User();
        $user = $userModel->getById($id);
        $userCourses = $userModel->getUserCourses($id);
        $courseNamesArray = array_column($userCourses, 'courseName');
        $courseNames = implode(', ', $courseNamesArray);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lưu avatar mới nếu có
            $avatar = $user['avatar'];
            if (!empty($_FILES['avatar']['name'])) {
                $avatar = $_FILES['avatar']['name'];
                $target = "public/uploads/" . basename($avatar);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
            }

            // Cập nhật thông tin user
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'role' => $_POST['role'],
                'birthyear' => $_POST['birthyear'],
                'gender' => $_POST['gender'],  // 0: nam hoặc 1: nữ
                'avatar' => $avatar
            ];
            $userModel->update($id, $data);
            header("Location: index.php?controller=admin&action=userList");
            exit;
        }

        // Lấy danh sách khóa học để lựa chọn
        $courseModel = new Course();
        $courses = $courseModel->getAll();
        include "views/admin/user/edit.php";
    }

    public function userDelete($id)
    {
        $userModel = new User();
        $userModel->delete($id);
        header("Location: index.php?controller=admin&action=userList");
        exit;
    }
}
