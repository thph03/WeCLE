
<h1><?= $test['name'] ?></h1>
<p><?= $test['description'] ?></p>

<form action="index.php?controller=test&action=submitTest&id=<?= $test['id'] ?>" method="post" class="test-form">
    <?php foreach ($questions as $index => $question): ?>
        <div class="question">
            <p class="question-text"><strong>Câu <?= $index + 1 ?>:</strong> <?= $question['question'] ?></p>
            <div class="options">
                <?php foreach ($question['options'] as $opt): ?>
                    <label class="option-label">
                        <input type="radio" name="question_<?= $index ?>" value="<?= $opt ?>" required>
                        <span class="option-text"><?= $opt ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>
        <br>
    <?php endforeach; ?>
    <button type="submit" class="submit-button">Nộp bài</button>
</form>

<style>
    /* Đảm bảo phần header không bị ảnh hưởng */
    header {
        position: relative;
        z-index: 10;
    }

    /* Form kiểm tra */
    .test-form {
        max-width: 800px;
        margin: 40px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 12px;  /* Góc bo tròn */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
        overflow: hidden;  /* Đảm bảo không bị tràn ra ngoài */
    }

    .test-form h1 {
        text-align: center;
        font-size: 26px;
        color: #333;
        margin-bottom: 20px;
    }

    .test-form p {
        text-align: center;
        font-size: 18px;
        color: #666;
        margin-bottom: 30px;
    }

    .question {
        margin-bottom: 25px;
    }

    .question-text {
        font-size: 18px;
        color: #333;
        margin-bottom: 10px;
    }

    .options {
        margin-left: 20px;
    }

    .option-label {
        display: block;
        margin: 12px 0;
        font-size: 16px;
        color: #444;
        cursor: pointer;
        transition: background-color 0.3s, padding 0.3s;
        padding: 8px;
        border-radius: 6px;
    }

    .option-label input[type="radio"] {
        margin-right: 10px;
    }

    .option-label:hover {
        background-color: #f0f0f0;
    }

    .submit-button {
        width: 100%;
        padding: 14px;
        background-color: #4CAF50;
        color: #fff;
        font-size: 18px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-button:hover {
        background-color: #45a049;
    }
</style>
