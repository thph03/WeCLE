<?php include 'views/menu/header.php'; ?>
<style>
    .container {
        text-align: center;
        margin-top: 50px;
    }

    .container h1 {
        color: #f3a998;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        justify-content: center;
        gap: 10px;
        background: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: fit-content;
        margin: auto;
    }

    input[type="text"] {
        padding: 10px;
        width: 250px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        padding: 10px 15px;
        background: #f3a998;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .result {
        text-align: left;
        margin-top: 30px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        background: #fff7f5;
        padding: 20px;
        border-radius: 10px;
        font-size: 16px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-family: 'Poppins', sans-serif;
    }

    .result h2 {
        color: #f3a998;
    }

    .result ul {
        padding-left: 20px;
    }

    .result li {
        margin-bottom: 5px;
    }

    .result em {
        color: #888;
    }

    .text-muted {
        color: #888;
        font-size: 14px;
        font-style: italic;
    }
</style>

<body>
    <div class="container">
        <h1>Look up?</h1>
        <form method="POST" action="">
            <input type="text" name="word" placeholder="Nhập từ cần tra" required>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-search"></i>
            </button>
        </form>

        <?php if (isset($definition) && !isset($error)): ?>
            <div class="result"><br>
                <h2>Result:</h2><br>
                <ul>
                    <?php if (!empty($definition) && isset($definition[0]['word'])): ?>
                        <h3>
                            <strong><?php echo $definition[0]['word']; ?></strong>
                            <?php
                            // Kiểm tra và lấy phiên âm
                            $phonetic = '';
                            if (!empty($definition[0]['phonetics'])) {
                                foreach ($definition[0]['phonetics'] as $p) {
                                    if (!empty($p['text'])) {
                                        $phonetic = $p['text'];
                                        break;
                                    }
                                }
                            }
                            ?>
                            <?php if (!empty($phonetic)): ?>
                                <small class="text-muted" style="margin-left: 10px;"><?php echo $phonetic; ?></small>
                            <?php endif; ?>
                        </h3>
                    <?php endif; ?>

                    <?php foreach ($definition as $entry): ?>
                        <?php foreach ($entry['meanings'] as $meaning): ?>
                            <p><em><?php echo $meaning['partOfSpeech']; ?></em></p>
                            <ul>
                                <?php foreach ($meaning['definitions'] as $def): ?>
                                    <li><?php echo $def['definition']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <br>
        <?php elseif (isset($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
<?php include 'views/menu/footer.php'; ?>