<?php include_once 'views/menu/header.php'; ?>
<link rel="stylesheet" href="public/css/course.css">
<?php if (empty($courses)): ?>
    <p>Bạn chưa đăng ký khóa học nào.</p>
<?php else: ?>
    <div class="course-container">
        <?php foreach ($courses as $course): ?>
            <div class="course-card">
                <?php if (!empty($course['image'])): ?>
                    <img src="public/uploads/<?= htmlspecialchars($course['image']) ?>" class="course-image"
                        alt="<?= $course['courseName'] ?>">
                <?php endif; ?>
                <div class="course-title"><?= htmlspecialchars($course['courseName']) ?></div>
                <a href="index.php?controller=usercourse&action=unregister&id=<?= $course['courseId'] ?>" class="btn-unregister"
                    onclick="return confirm('Bạn có chắc chắn muốn hủy đăng ký?')">Hủy đăng ký</a>
            </div>

        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include_once 'views/menu/footer.php'; ?>