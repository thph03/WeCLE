    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Quản lý khóa học</title>
        <link rel="stylesheet" href="public/admin/assets/css/admin-style.css">
    </head>
    <body>
        <nav>
            <div>
                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === 'admin'): ?>
                    <a href="home">Home</a> |
                    <a href="index.php?controller=admin&action=index">Danh sách khóa học</a> |
                    <a href="index.php?controller=admin&action=userList">Quản lý người dùng</a>
                <?php endif; ?>
            </div>
            <div>
                <?php if (isset($_SESSION["username"])): ?>
                    👋 Xin chào, <strong><?= htmlspecialchars($_SESSION["username"]) ?></strong> |
                    <a href="index.php?controller=auth&action=logout">Đăng xuất</a>
                <?php endif; ?>
            </div>
        </nav>
        <hr>
