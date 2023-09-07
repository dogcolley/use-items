<?php
include_once('./_common.php');

// MySQL 데이터베이스 연결 정보
$host = 'db';
$dbname = 'gnuboard';
$username = 'gnuboard';
$password = 'gnuboard';

// 데이터베이스 연결
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// 클라이언트로부터의 메시지 수신
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];

    // 메시지를 데이터베이스에 저장
    $stmt = $conn->prepare("INSERT INTO messages (message) VALUES (?)");
    $stmt->execute([$message]);

    // 새로운 메시지를 다른 클라이언트들에게 전송
    sendChatMessage($message);
}

// 채팅 메시지 전송 함수
function sendChatMessage($message) {
    $socket = fsockopen('chat', 3000); // chat 서비스로 변경
    if ($socket) {
        fwrite($socket, $message);
        fclose($socket);
    }
}