<?php include 'views/admin/layout/header.php'; ?>
<style>
    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 12px;
        margin: 0 4px;
        border: 1px solid #ccc;
        color: #333;
        text-decoration: none;
        border-radius: 4px;
    }

    .pagination a.active {
        background-color: #f3a998;
        color: #fff;
        font-weight: bold;
    }

    .pagination a:hover {
        background-color: #fff;
        color: #f3a998;
    }
</style>
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
            <td><?= date('d/m/y', strtotime($user['birthyear'])) ?></td>
            <td><?= $user['gender'] == 0 ? 'Nam' : 'Nữ' ?></td>
            <td><img src="public/uploads/<?= $user['avatar'] ?>" width="50" height="50"></td>
            <td><?= $user['courses'] ?></td>

            <td>
                <a href="index.php?controller=admin&action=userEdit&id=<?= $user['id'] ?>">Sửa</a> |
                <a href="index.php?controller=admin&action=userDelete&id=<?= $user['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<!-- <div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?controller=admin&action=userList&page=<?= $page - 1 ?>">&laquo; Trước</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?controller=admin&action=userList&page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="?controller=admin&action=userList&page=<?= $page + 1 ?>">Sau &raquo;</a>
    <?php endif; ?>
</div> -->
<br>
<?php include 'views/admin/layout/footer.php'; ?>