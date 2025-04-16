<?php include 'views/admin/layout/header.php'; ?>

<h2>Sửa Khóa Học</h2>

<form method="POST" enctype="multipart/form-data">
    <label for="courseId">Mã Khóa Học:</label>
    <input type="text" name="courseId" id="courseId" value="<?= $course['courseId'] ?>" readonly><br>

    <label for="courseName">Tên Khóa Học:</label>
    <input type="text" name="courseName" id="courseName" value="<?= $course['courseName'] ?>" required><br>

    <label for="categoryId">Danh Mục:</label>
    <select name="categoryId" id="categoryId">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>" <?= $course['categoryId'] == $category['id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="image">Hình Ảnh:</label>
    <?php if (!empty($course['image'])): ?>
        <br><img src="public/uploads/<?= htmlspecialchars($course['image']) ?>" alt="<?= $course['courseName'] ?>" width="100" />
        <br><small><strong>Lưu ý:</strong> Nếu muốn thay đổi hình ảnh, hãy chọn hình mới.</small>
        <!-- Thêm input ẩn để giữ lại hình ảnh cũ -->
        <input type="hidden" name="current_image" value="<?= htmlspecialchars($course['image']) ?>">
    <?php endif; ?>
    <input type="file" name="image" id="image"><br>

    <input type="submit" value="Cập Nhật Khóa Học">
</form>

<?php include 'views/admin/layout/footer.php'; ?>
