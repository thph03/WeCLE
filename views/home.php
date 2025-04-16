<?php
include 'menu/header.php';
?>
    <section class="banner">
        <img src="public\images\banner_2.png" alt="Banner nền" class="banner-background-image">
        <?php /* Nội dung text banner nếu có
        <div class="container banner-content">
            <h1>Học Tiếng Anh Online Hiệu Quả</h1>
            <p>Khám phá các khóa học và tài liệu đa dạng.</p>
        </div>
        */ ?>
    </section>

    <main class="site-main container">
        <h2>Nội dung nổi bật</h2>
        <div class="content-grid">
            <?php // Các khối content item ?>
             <article class="content-item news-light"><h3>Tin tức nhẹ</h3><p>Một vài mẹo nhỏ...</p><a href="#">Đọc thêm</a></article>
             <article class="content-item grammar-highlight"><h3>Ngữ pháp cần nhớ</h3><p>Phân biệt thì...</p><a href="#">Xem chi tiết</a></article>
             <article class="content-item vocabulary-spotlight"><h3>Từ vựng theo chủ đề</h3><p>Chủ đề: Du lịch...</p><a href="#">Học ngay</a></article>
             <article class="content-item work-english"><h3>Tiếng Anh công sở</h3><p>Cách viết email...</p><a href="#">Tìm hiểu</a></article>
             <section class="youtube-embed">
                 <h3>Video bài học</h3>
                 <?php $youtube_link = "https://www.youtube.com/embed/Ge7c7otG2mk"; // Thay ID video ?>
                 <iframe width="960" height="315" src="<?php echo htmlspecialchars($youtube_link); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </section>
             <article class="content-item news-section"><h3>Tin tức mới nhất</h3><ul><li><a href="#">Bản tin giáo dục...</a></li><li><a href="#">Phương pháp học mới...</a></li></ul><a href="#">Xem tất cả tin tức</a></article>
             <article class="content-item pronunciation-tip"><h3>Mẹo phát âm</h3><p>Cách phân biệt âm...</p><a href="#">Luyện tập</a></article>
        </div> <?php // end .content-grid ?>

        <section class="courses-section">
            <h2>Khóa học tiêu biểu</h2>
            <div class="courses-grid">
                <?php
                // Dữ liệu khóa học mẫu
                $courses = [
                    ['id' => 1, 'title' => 'Tiếng Anh Giao Tiếp Cơ Bản', 'image' => 'public\images\1.png', 'alt' => 'Khóa học tiếng Anh giao tiếp cơ bản'],
                    ['id' => 2, 'title' => 'Luyện Thi IELTS 6.5+', 'image' => 'public\images/2.png', 'alt' => 'Khóa học luyện thi IELTS 6.5+'],
                    ['id' => 3, 'title' => 'Ngữ Pháp Tiếng Anh Toàn Tập', 'image' => 'public\images/3.png', 'alt' => 'Khóa học ngữ pháp tiếng Anh toàn tập'],
                    ['id' => 4, 'title' => 'Từ Vựng Tiếng Anh Thông Dụng', 'image' => 'public\images/4.png', 'alt' => 'Khóa học từ vựng tiếng Anh thông dụng'],
                    ['id' => 5, 'title' => 'Tiếng Anh Cho Người Đi Làm', 'image' => 'public\images/5.png', 'alt' => 'Khóa học tiếng Anh cho người đi làm'],
                    ['id' => 6, 'title' => 'Phát Âm Chuẩn Giọng Mỹ', 'image' => 'public\images/6.png', 'alt' => 'Khóa học phát âm chuẩn giọng Mỹ'],
                    ['id' => 7, 'title' => 'Tiếng Anh Qua Phim Ảnh', 'image' => 'public\images/7.png', 'alt' => 'Khóa học tiếng Anh qua phim ảnh'],
                    ['id' => 8, 'title' => 'Luyện Viết Email & CV', 'image' => 'public\images/8.png', 'alt' => 'Khóa học luyện viết Email và CV tiếng Anh']
                 ];
                foreach ($courses as $course) {
                ?>
                    <article class="course-item">
                        <!-- <a href="/course<?php echo $course['id']; ?>" class="course-link"> -->
                        <a href="index.php?controller=userCourse&action=index" class="course-link">
                            <img src="<?php echo htmlspecialchars($course['image']); ?>" alt="<?php echo htmlspecialchars($course['alt']); ?>" class="course-image">
                            <div class="course-info">
                                <h3 class="course-title"><?php echo htmlspecialchars($course['title']); ?></h3>
                                <span class="course-view-detail">Xem chi tiết</span>
                            </div>
                        </a>
                    </article>
                <?php } // end foreach ?>
            </div> 
        </section>
    </main> 
<?php
include 'menu/footer.php';
?>

<script>

const themeToggleButton = document.getElementById('theme-toggle-button');
const currentTheme = localStorage.getItem('theme'); // Kiểm tra theme đã lưu

// Áp dụng theme đã lưu khi tải trang
if (currentTheme === 'dark') {
    document.body.classList.replace('light-mode', 'dark-mode');
} else {
    // Mặc định là light-mode đã có sẵn trong HTML
    document.body.classList.add('light-mode'); // Đảm bảo class tồn tại
}


themeToggleButton.addEventListener('click', () => {
    // Kiểm tra xem body đang có class 'dark-mode' hay không
    if (document.body.classList.contains('dark-mode')) {
        // Nếu đang là dark -> chuyển sang light
        document.body.classList.replace('dark-mode', 'light-mode');
        localStorage.setItem('theme', 'light'); // Lưu lựa chọn
    } else {
        // Nếu đang là light -> chuyển sang dark
        document.body.classList.replace('light-mode', 'dark-mode');
        localStorage.setItem('theme', 'dark'); // Lưu lựa chọn
    }
});
</script>