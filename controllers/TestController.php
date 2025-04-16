<?php
require_once 'models/Test.php';

class TestController {
    public function index() {
        $testModel = new Test();
        $tests = $testModel->getAllTests();
        require_once 'views/tests/index.php';
    }

    public function detail($id = null) {
        if (!$id) {
            echo "Không có ID bài test";
            return;
        }

        $testModel = new Test();
        $test = $testModel->getTestById($id);
        $questions = $testModel->getQuestionsByTestId($id);

        if (!$test || !$questions) {
            echo "Không tìm thấy bài test hoặc câu hỏi";
            return;
        }

        require_once 'views/tests/detail.php';
    }

    public function submitTest($id = null) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $score = 0;
            $testModel = new Test();
            $questions = $testModel->getQuestionsByTestId($id);
            $total = count($questions);
    
            foreach ($questions as $index => $question) {
                $answerKey = 'question_' . $index;
                // Kiểm tra sự tồn tại của 'answer' trong câu hỏi và so sánh với câu trả lời người dùng
                if (isset($question['answer']) && isset($_POST[$answerKey]) && trim($_POST[$answerKey]) === trim($question['answer'])) {
                    $score++;
                }              
            }
            // Truyền dữ liệu $score và $total vào view kết quả
            require_once 'views/tests/result.php';
        } else {
            echo "Yêu cầu không hợp lệ";
        }
    }
    
    
    
    
}
