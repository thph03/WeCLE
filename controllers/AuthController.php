<?php
require_once 'models/Users.php';
require_once 'config/database.php';

class AuthController
{
    public function login()
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userModel = new User();

            $username = trim($_POST["username"]);
            $password = $_POST["password"];

            $user = $userModel->getByUsername($username);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION["user_id"] = $user['id'];
                $_SESSION["username"] = $user['username'];
                $_SESSION["role"] = $user['role'];

                // Phân quyền truy cập
                if ($user['role'] === 'admin') {
                    header("Location: index.php?controller=admin&action=index");
                } else {
                    header("Location: index.php?controller=home&action=index");
                }
                exit();
            } else {
                $error = "Sai tên đăng nhập hoặc mật khẩu.";
            }
        }

        require 'views/authentication/login.php';
    }

    public function register()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $email = trim($_POST["email"]);
        $role = 'student';
        $birthyear = $_POST["birthyear"];
        $gender = $_POST["gender"];

        // Avatar upload
        $avatar = null;
        if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0) {
            if (!is_dir("public/uploads")) {
                mkdir("public/uploads", 0777, true);
            }
            $avatarName = time() . '_' . basename($_FILES["avatar"]["name"]);
            $uploadPath = "public/uploads/" . $avatarName;
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $uploadPath)) {
                $avatar = $avatarName;
            }
        }

        $userModel = new User();
        
        // Kiểm tra email đã tồn tại chưa
        if ($userModel->isEmailExists($email)) {
            $error = "Email đã tồn tại. Vui lòng sử dụng email khác.";
            require 'views/authentication/register.php';
            return;
        }

        $result = $userModel->register($username, $password, $email, $role, $birthyear, $gender, $avatar);

        if ($result) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        } else {
            $error = "Tên đăng nhập hoặc email đã tồn tại!";
        }
    }

    require 'views/authentication/register.php';
}


    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php?controller=home&action=index");
    }
}
