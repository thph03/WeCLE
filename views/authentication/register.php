<?php include 'views/menu/header.php'; ?>
<style>
    .register-container {
        max-width: 500px;
        margin: 30px auto;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .register-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #f3a998;
        /* màu cam pastel */
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group input[type="email"],
    .form-group input[type="date"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    .gender-group {
        display: flex;
        gap: 15px;
        padding-top: 5px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #f3a998;
        /* hồng pastel */
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
    }

    button[type="submit"]:hover {
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

<div class="register-container">
    <h2>Đăng ký tài khoản</h2>
    <?php if (!empty($error)): ?>
        <div style="color: red; text-align: center; margin-bottom: 15px;">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="?controller=auth&action=register" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" value="<?= isset($username) ? htmlspecialchars($username) : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="birthyear">Năm sinh</label>
            <input type="date" name="birthyear" value="<?= isset($birthyear) ? htmlspecialchars($birthyear) : '' ?>" required>
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <div class="gender-group">
                <input type="radio" name="gender" value= 0 <?= (isset($gender) && $gender == 'Nam') ? 'checked' : '' ?>> Nam
                <input type="radio" name="gender" value= 1 <?= (isset($gender) && $gender == 'Nữ') ? 'checked' : '' ?>> Nữ
            </div>
        </div>
        <div class="form-group">
            <label for="avatar">Ảnh đại diện</label>
            <input type="file" name="avatar">
        </div>
        <button type="submit">Đăng ký</button>
        <div class="form-group switch-form">
            <span>Đã có tài khoản? <a href="index.php?controller=auth&action=login">Đăng nhập</a></span>
        </div>
    </form>
</div>

<?php include 'views/menu/footer.php'; ?>