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
    border: 1px solid #f3a998;
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
<div class="pagination">
  <?php if ($page > 1): ?>
    <a href="?controller=admin&action=index&page=<?= $page - 1 ?>">&laquo; Trước</a>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <a href="?controller=admin&action=index&page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>">
      <?= $i ?>
    </a>
  <?php endfor; ?>

  <?php if ($page < $totalPages): ?>
    <a href="?controller=admin&action=index&page=<?= $page + 1 ?>">Sau &raquo;</a>
  <?php endif; ?>
</div>
<br>

<?php include 'views/admin/layout/footer.php'; ?>