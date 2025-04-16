<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả bài test</title>
    <style>
        /* Định dạng chung cho trang kết quả */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            color: #555;
            margin: 10px 0;
        }

        p strong {
            font-weight: bold;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            font-size: 1.1rem;
            text-decoration: none;
            color: #007BFF;
            padding: 10px 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #ddd;
        }

        /* Kết quả điểm số */
        .score {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
            margin-top: 10px;
        }

        .score.fail {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kết quả</h2>
        <p>Bạn trả lời đúng: <?= isset($score) ? $score : 0 ?> / <?= isset($total) ? $total : 0 ?></p>
        <p class="score <?= (isset($score) && $score < $total) ? 'fail' : '' ?>">
            Điểm: <?= isset($score) && isset($total) ? round($score / $total * 10, 2) : 0 ?>/10
        </p>
        <a href="./test">Quay lại danh sách bài test</a>
    </div>
</body>
</html>
