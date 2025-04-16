<?php include 'views/admin/layout/header.php'; ?>

<h2>Danh sách khóa học</h2>
<a href="index.php?controller=admin&action=add" class="btn-add">+ Thêm khóa học</a>

<?php if (isset($message)): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($message) ?>
    </div>
<?php endif; ?>

<table>
  <thead>
    <tr>
      <th>Mã</th>
      <th>Tên</th>
      <th>Danh mục</th>
      <th>Hình ảnh</th>
      <th>Hành động</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($courses as $c): ?>
        <tr>
            <td><?= $c['courseId'] ?></td>
            <td><?= $c['courseName'] ?></td>
            <td><?= $c['categoryId'] ?></td>
            <td>
                <?php if (!empty($c['image'])): ?>
                    <img src="public/uploads/<?= $c['image'] ?>" alt="<?= $c['courseName'] ?>" width="50">
                <?php else: ?>
                    Không có hình ảnh
                <?php endif; ?>
            </td>
            <td>
                <a href="index.php?controller=admin&action=edit&id=<?= $c['courseId'] ?>">Sửa</a> |
                <a href="index.php?controller=admin&action=delete&id=<?= $c['courseId'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include 'views/admin/layout/footer.php'; ?>
