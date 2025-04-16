<?php include_once 'views/menu/header.php'; ?>
<link rel="stylesheet" href="public/css/course.css">
<?php if (!empty($message)): ?>
    <script>
        window.onload = function() {
            alert("<?= addslashes($message) ?>");
        };
    </script>
<?php endif; ?>

<?php if (empty($courses)): ?>
    <p style="padding: 20px;">Hiện tại không có khóa học nào có sẵn.</p>
<?php else: ?>
    <div class="course-container">
        <?php foreach ($courses as $course): ?>
            <div class="course-card">
                <?php if (!empty($course['image'])): ?>
                    <img src="public/uploads/<?= htmlspecialchars($course['image']) ?>" alt="<?= htmlspecialchars($course['courseName']) ?>" class="course-image">
                <?php endif; ?>
                <div class="course-title"><?= htmlspecialchars($course['courseName']) ?></div>
                <a href="index.php?controller=usercourse&action=register&id=<?= $course['courseId'] ?>" class="btn-register">Đăng ký</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include_once 'views/menu/footer.php'; ?>
