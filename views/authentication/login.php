<?php include 'views/menu/header.php'; ?>
<style>
    .form-container {
        max-width: 420px;
        margin: 80px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        font-family: "Segoe UI", sans-serif;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #f3a998;
    }

    .form-group {
        margin-bottom: 18px;
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 6px;
        font-weight: 500;
        color: #333;
    }

    .form-group input {
        padding: 10px;
        border: 1px solid #ffc107;
        border-radius: 8px;
        font-size: 16px;
    }

    .form-group button {
        padding: 12px;
        background-color: #f3a998;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-group button:hover {
        background-color: #EB8D78;
    }

    .switch-form {
        text-align: center;
        font-size: 15px;
    }

    .switch-form a {
        color: #f3a998;
        text-decoration: none;
        font-weight: 600;
    }
</style>
<div class="form-container">
    <h2>Đăng nhập</h2>
    <form action="?controller=auth&action=login" method="post">
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Đăng nhập</button>
        </div>
        <div class="form-group switch-form">
            <span>Chưa có tài khoản? <a href="index.php?controller=auth&action=register">Đăng ký</a></span>
        </div>
    </form>
</div>


<?php include 'views/menu/footer.php'; ?>