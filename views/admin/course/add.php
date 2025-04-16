<?php include 'views/admin/layout/header.php'; ?>

<h2>Thêm Khóa Học Mới</h2>

<form method="POST" enctype="multipart/form-data">
    <label for="courseId">Mã Khóa Học:</label>
    <input type="text" name="courseId" id="courseId" required><br>

    <label for="courseName">Tên Khóa Học:</label>
    <input type="text" name="courseName" id="courseName" required><br>

    <label for="categoryId">Danh Mục:</label>
    <select name="categoryId" id="categoryId">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="image">Hình Ảnh:</label>
    <input type="file" name="image" id="image"><br>

    <input type="submit" value="Thêm Khóa Học">
</form>

<?php include 'views/admin/layout/footer.php'; ?>
