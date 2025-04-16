<?php
use GuzzleHttp\Client;

class ChatbotController
{
    private $API_KEY = 'AIzaSyCecHRNHKHLRd7WOZR-xT8bcL60XGYPObo'; // Thay bằng key của bạn
    
    // Hiển thị trang chat
    public function index()
    {
        include "views/chat.php";
    }

    // API xử lý gửi tin nhắn
    public function send()
{
    session_start(); // Quan trọng: để dùng $_SESSION
    header('Content-Type: application/json');

    $input = json_decode(file_get_contents("php://input"), true);
    $message = $input['message'] ?? '';

    if (empty($message)) {
        echo json_encode(['response' => 'Bạn chưa nhập nội dung.']);
        return;
    }

    // Tạo mảng hội thoại nếu chưa có
    if (!isset($_SESSION['chat_history'])) {
        $_SESSION['chat_history'] = [
            [
                'role' => 'user',
                'parts' => [['text' => "Bạn là giáo viên tiếng Anh chuyên nghiệp. Hãy trả lời bằng tiếng Việt nếu người dùng nói tiếng Việt. Nếu có bài tập ví dụ trong phần dạy của mình, hãy dùng tiếng Anh. Bạn hãy trả lời chính xác mọi câu hỏi có liên quan đến vấn đề học Tiếng Anh."]]
            ]
        ];
    }

    // Thêm câu mới từ người dùng vào lịch sử
    $_SESSION['chat_history'][] = [
        'role' => 'user',
        'parts' => [['text' => $message]]
    ];

    $data = [
        'contents' => $_SESSION['chat_history']
    ];

    $jsonData = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro:generateContent?key=' . $this->API_KEY);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $body = json_decode($response, true);

    if (isset($body['candidates'][0]['content']['parts'][0]['text'])) {
        $reply = $body['candidates'][0]['content']['parts'][0]['text'];

        // Thêm phản hồi của AI vào lịch sử
        $_SESSION['chat_history'][] = [
            'role' => 'model',
            'parts' => [['text' => $reply]]
        ];
    } else {
        $reply = 'Không có phản hồi từ AI.';
    }

    echo json_encode(['response' => $reply]);
}

    

}
