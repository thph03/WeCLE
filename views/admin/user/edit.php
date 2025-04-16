<?php include 'views/admin/layout/header.php'; ?>

<h2>Sửa người dùng</h2>
<form action="index.php?controller=admin&action=userEdit&id=<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
    <label>Username:</label>
    <input type="text" name="username" value="<?= $user['username'] ?>" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= $user['email'] ?>" required><br>

    <label>Role:</label>
    <select name="role" required>
        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="student" <?= $user['role'] == 'student' ? 'selected' : '' ?>>Student</option>
    </select><br>

    <label>Birth Year:</label>
    <input type="date" name="birthyear" value="<?= isset($birthyear) ? htmlspecialchars($birthyear) : '' ?>" required><br>

    <label>Gender:</label>
    <input type="radio" name="gender" value="0" <?= $user['gender'] == 0 ? 'checked' : '' ?>> Nam
    <input type="radio" name="gender" value="1" <?= $user['gender'] == 1 ? 'checked' : '' ?>> Nữ<br>

    <label>Avatar:</label>
    <input type="file" name="avatar"><br>
    <img src="public/uploads/<?= $user['avatar'] ?>" width="100" height="100"><br>

    <?php if (!empty($courseNames)): ?>
        <label>Khóa học đã đăng ký:</label>
        <p><?= $courseNames ?></p>
    <?php endif; ?>
    <br>

    <button type="submit">Cập nhật</button>
</form>

<?php include 'views/admin/layout/footer.php'; ?>