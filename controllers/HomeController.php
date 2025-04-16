<?php
require_once 'models/Vocabulary.php';

class HomeController {
    public function index() {
        require_once 'views/home.php';
    }

    public function vocab() {
        $definition = null;
        $error = null;

        if (isset($_POST['word'])) {
            $vocabulary = new Vocabulary();
            $result = $vocabulary->getWordDefinition($_POST['word']);

            if (isset($result['error'])) {
                $error = $result['error'];
            } else {
                $definition = $result;
            }
        }

        require_once 'views/vocab.php';
    }
}
?>
