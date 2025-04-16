<?php
class TranslationController {
    private $apiUrl = "https://api.mymemory.translated.net/get";
    
    public function index() {
        include "views/translate.php";
    }

    public function translateText() {
        if (!isset($_GET['text']) || !isset($_GET['from']) || !isset($_GET['to'])) {
            echo json_encode(["error" => "Missing parameters"]);
            return;
        }

        $text = urlencode($_GET['text']);
        $fromLang = $_GET['from'];
        $toLang = $_GET['to'];

        $url = "$this->apiUrl?q=$text&langpair=$fromLang|$toLang";
        
        $response = file_get_contents($url);
        if ($response === FALSE) {
            echo json_encode(["error" => "Translation failed"]);
            return;
        }

        $data = json_decode($response, true);
        if (isset($data['responseData']['translatedText'])) {
            echo json_encode(["translatedText" => $data['responseData']['translatedText']]);
        } else {
            echo json_encode(["error" => "Translation not found"]);
        }
    }
}
?>