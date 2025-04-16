<?php
class AuthMiddleware
{
    public static function adminOnly()
    {
        session_start();
        if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
            // Nếu không phải admin thì chuyển hướng về trang chủ
            header("Location: index.php?controller=home&action=index");
            exit();
        }
    }
}
