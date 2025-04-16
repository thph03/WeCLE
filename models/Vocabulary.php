
<?php
class Vocabulary {
    private $api_url = "https://api.dictionaryapi.dev/api/v2/entries/en/";

    public function getWordDefinition($word) {
        $url = $this->api_url . strtolower($word);

        // Khởi tạo cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Bỏ kiểm tra SSL nếu cần

        // Gọi API
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Kiểm tra lỗi HTTP
        if ($http_code != 200) {
            return ["error" => "Lỗi: Không thể lấy dữ liệu cho từ '$word'. Mã lỗi HTTP: $http_code"];
        }

        // Chuyển kết quả thành JSON
        return json_decode($response, true);
    }
}
?>

