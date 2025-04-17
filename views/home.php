<?php
include 'menu/header.php';
?>
<style>
    /* Highlight Section (Nội dung nổi bật) */
    .highlight-section .content-item {
        background-color: var(--card-bg-light);
        border: 1px solid var(--border-color-light);
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }

    body.dark-mode .highlight-section .content-item {
        background-color: var(--card-bg-dark);
        border: 1px solid var(--border-color-dark);
    }

    .highlight-section .content-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.12);
    }

    .highlight-image {
        width: 100%;
        height: 150px;
        object-fit: cover;
        display: block;
    }

    .highlight-info {
        padding: 15px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .highlight-info h3 {
        color: var(--primary-color-light);
        margin-top: 0;
        margin-bottom: 10px;
    }

    body.dark-mode .highlight-info h3 {
        color: var(--primary-color-dark);
    }

    .highlight-info p {
        flex-grow: 1;
        opacity: 0.9;
        margin-bottom: 10px;
    }

    .highlight-info a {
        align-self: start;
        background-color: var(--primary-color-light);
        color: white;
        padding: 6px 10px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.9em;
        transition: background-color 0.3s;
    }

    body.dark-mode .highlight-info a {
        background-color: var(--primary-color-dark);
        color: #111;
    }

    .highlight-info a:hover {
        background-color: var(--secondary-color-light);
    }

    body.dark-mode .highlight-info a:hover {
        background-color: var(--secondary-color-dark);
    }

    .highlight-carousel-wrapper {
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;

    }

    .highlight-carousel {
        display: flex;
        gap: 20px;
        transition: transform 0.5s ease-in-out;
        will-change: transform;
        scroll-snap-align: start;
    }

    .content-item {
        min-width: 33%;
        /* 4 mục / 100% = 25% - trừ đi gap */
        background-color: var(--card-bg-light);
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
        flex-shrink: 0;
        text-align: center;
    }

    .highlight-icon {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 10px;
    }
</style>
<link rel="stylesheet" href="public/css/huystyle.css">
<section class="banner">
    <img src="public\images\banner_2.png" alt="Banner nền" class="banner-background-image">
</section>

<main class="site-main">
    <div class="highlight-carousel-wrapper">
        <div class="highlight-carousel" id="highlight-carousel">
            <article class="content-item">
                <img src="https://lh6.googleusercontent.com/proxy/wsEXsFZVVESVyD5EpLhTX0KmIdSTyQv9MIab0TvvSuflKIRDkSv2WoqMMnAb0cr-UNfCU0x_PAidImN-7CiVgMd7JkuOoHxF3nQa3sIkEnYh_bq7AjdwXkTf" alt="Tin tức nhẹ" class="highlight-icon">
                <h3>Tin tức nhẹ</h3>
                <p>Một vài mẹo nhỏ...</p>
                <a href="#">Đọc thêm</a>
            </article>
            <article class="content-item">
                <img src="https://pantado.edu.vn/storage/media/mSPJ4PJaha0juIUm6ejSGjoLFnXydYYIyvmPjHnZ.jpeg" alt="Ngữ pháp" class="highlight-icon">
                <h3>Ngữ pháp cần nhớ</h3>
                <p>Phân biệt thì...</p>
                <a href="#">Xem chi tiết</a>
            </article>
            <article class="content-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLO0wc_6HWQeoSoHFSbMwazT2Pi_Ca9HDNig&s" alt="Từ vựng" class="highlight-icon">
                <h3>Từ vựng theo chủ đề</h3>
                <p>Chủ đề: Du lịch...</p>
                <a href="#">Học ngay</a>
            </article>
            <article class="content-item">
                <img src="https://pasal.edu.vn/wp-content/uploads/2024/09/tiecc82cc81ng20anh20giao20tiecc82cc81p20cocc82ng20socc9bcc8920-20pasal.webp" alt="Tiếng Anh công sở" class="highlight-icon">
                <h3>Tiếng Anh công sở</h3>
                <p>Cách viết email...</p>
                <a href="#">Tìm hiểu</a>
            </article>
            <article class="content-item">
                <img src="https://indec.vn/wp-content/uploads/2021/03/image7-1.jpg" alt="Tin tức mới" class="highlight-icon">
                <h3>Tin tức mới nhất</h3>
                <ul>
                    <li><a href="#">Bản tin giáo dục...</a></li>
                    <li><a href="#">Phương pháp học mới...</a></li>
                </ul>
                <a href="#">Xem tất cả tin tức</a>
            </article>
            <article class="content-item">
                <img src="https://nativex.edu.vn/wp-content/uploads/2021/12/cach-phat-am-duoi-.jpeg" alt="Phát âm" class="highlight-icon">
                <h3>Mẹo phát âm</h3>
                <p>Cách phân biệt âm...</p>
                <a href="#">Luyện tập</a>
            </article>
        </div>
    </div>

    <section class="youtube-embed">
        <h3 style="text-align: center;">Video bài học</h3><br>
        <?php $youtube_link = "https://www.youtube.com/embed/Ge7c7otG2mk"; // Thay ID video 
        ?>
        <iframe width="600" height="300" src="<?php echo htmlspecialchars($youtube_link); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </section>

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
            <?php } // end foreach 
            ?>
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
<script>
    const carousel = document.getElementById('highlight-carousel');
    let scrollIndex = 0;

    function autoSlide() {
        const items = carousel.children;
        const itemWidth = items[0].offsetWidth + 20; // tính cả khoảng cách gap

        scrollIndex++;

        if (scrollIndex * itemWidth >= carousel.scrollWidth - carousel.clientWidth) {
            scrollIndex = 0;
        }

        carousel.style.transform = `translateX(-${scrollIndex * itemWidth}px)`;
    }

    setInterval(autoSlide, 3000); // 3 giây chuyển slide
</script>