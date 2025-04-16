<?php include 'views/menu/header.php'; ?>
<?php
if (isset($_GET['action']) && $_GET['action'] == 'translateText') {
    $text = urlencode($_GET['text']);
    $fromLang = $_GET['from'];
    $toLang = $_GET['to'];

    $apiUrl = "https://api.mymemory.translated.net/get?q=$text&langpair=$fromLang|$toLang";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    echo json_encode(['translatedText' => $data['responseData']['translatedText'] ?? 'Translation failed']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCLE-Từ Điển Tiếng Anh</title>
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

        select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #fffaf5;
            color: #333;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        select:focus {
            border-color: #f3a998;
            box-shadow: 0 0 5px rgba(243, 169, 152, 0.5);
        }

        #translationResult {
            display: none;
            /* Ẩn ban đầu */
            margin-top: 20px;
            padding: 15px;
            background: #fffaf5;
            border: 1px solid #f3a998;
            border-radius: 10px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-style: italic;
            color: #333;
        }
    </style>
    <script>
        function translateText() {
            let text = document.getElementById("text").value;
            let fromLang = document.getElementById("fromLang").value;
            let toLang = document.getElementById("toLang").value;

            fetch(`/WECLE/index.php?controller=translation&action=translateText&text=${encodeURIComponent(text)}&from=${fromLang}&to=${toLang}`)
                .then(response => response.json())
                .then(data => {
                    const resultDiv = document.getElementById("translationResult");
                    resultDiv.innerHTML = data.translatedText || "Translation failed";
                    resultDiv.style.display = "block"; // Hiển thị kết quả
                })
                .catch(error => console.error("Error:", error));
        }
    </script>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Translator</h1>
        <form>
            <input type="text" id="text" placeholder="Enter text" required>
            <select id="fromLang">
                <option value="vi">Vietnamese</option>
                <option value="en">English</option>
                <option value="es">Spanish</option>
                <option value="fr">French</option>
            </select>
            <select id="toLang">
                <option value="en">English</option>
                <option value="vi">Vietnamese</option>
                <option value="es">Spanish</option>
                <option value="fr">French</option>
            </select>
            <button type="button" onclick="translateText()">Dịch</button>
        </form>
        <br>
        <div id="translationResult"></div>
    </div>
</body>

</html>
<?php include 'views/menu/footer.php'; ?>