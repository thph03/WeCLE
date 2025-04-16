<?php
session_start();
session_destroy(); // Xóa phiên người dùng
header("Location: views/authentication/login.php"); // Chuyển hướng đến trang đăng nhập
exit();
?>
