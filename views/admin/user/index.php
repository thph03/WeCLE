<?php include 'views/admin/layout/header.php'; ?>

<h2>Danh sách người dùng</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Birth Year</th>
        <th>Gender</th>
        <th>Avatar</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['role'] ?></td>
            <td><?= $user['birthyear'] ?></td>
            <td><?= $user['gender'] ==0 ? 'Nam': 'Nữ' ?></td>
            <td><img src="public/uploads/<?= $user['avatar'] ?>" width="50" height="50"></td>
            <td><?= $user['courses'] ?></td>
            <td>
                <a href="index.php?controller=admin&action=userEdit&id=<?= $user['id'] ?>">Sửa</a> |
                <a href="index.php?controller=admin&action=userDelete&id=<?= $user['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'views/admin/layout/footer.php'; ?>
