<?php include 'views/menu/header.php'; ?>

<style>
    /* Chỉ áp dụng cho phần bài test */
    .test-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px; /* Thêm khoảng cách giữa các mục */
    }

    .test-item {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 12px;
        margin: 10px;
        padding: 20px;
        width: 280px; /* Tăng chiều rộng */
        text-align: center;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s ease-in-out;
        overflow: hidden;
    }

    .test-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* Tăng hiệu ứng shadow */
    }

    .test-item img {
        border-radius: 10px;
        max-width: 100%;
        height: auto;
        transition: transform 0.3s;
    }

    .test-item:hover img {
        transform: scale(1.05); /* Phóng to hình ảnh khi hover */
    }

    .test-item h3 {
        margin: 15px 0;
        font-size: 20px; /* Tăng kích thước tiêu đề */
        font-weight: bold;
        color: #333;
    }

    .test-item p {
        font-size: 16px; /* Tăng kích thước chữ mô tả */
        color: #666;
        line-height: 1.5;
    }

    .test-item a {
        display: inline-block;
        margin-top: 15px;
        background-color: #4CAF50;
        color: #fff;
        padding: 12px 25px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.3s;
    }

    .test-item a:hover {
        background-color: #45a049;
        transform: scale(1.05); /* Tăng kích thước nút khi hover */
    }
</style>
<br>
<ul class="test-list">
    <?php foreach ($tests as $test): ?>
        <li class="test-item">
            <img src="public/assets/images/<?= $test['image'] ?>" alt="<?= $test['name'] ?>" width="150">
            <h3><?= $test['name'] ?></h3>
            <p><?= $test['description'] ?></p>
            <a href="index.php?controller=test&action=detail&id=<?= $test['id'] ?>">Làm bài</a>
        </li>
    <?php endforeach; ?>
</ul>
