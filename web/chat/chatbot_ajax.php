<?php
include_once("./_common.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // OpenAI API 키 설정
    $api_key = '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';

    // API 엔드포인트 URL
    $api_url = 'https://api.openai.com/v1/engines/davinci/completions';

    $user_input = isset($_POST['user_input']) ? $_POST['user_input'] : '';

    if (!empty($user_input)) {
        // API 요청 데이터 설정
        $data = array(
            'prompt' => $user_input,
            'max_tokens' => 50
        );

        // cURL을 사용한 API 요청
        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        // API 응답 처리
        if ($response) {
            $result = json_decode($response, true);
            $chatbot_response = $result;//$result['choices'][0]['text'];
        } else {
            $chatbot_response = 'API 요청 실패';
        }

        // JSON 형식으로 응답 반환
        header('Content-Type: application/json');
        echo json_encode(array('response' => $chatbot_response));
    }
}
?>