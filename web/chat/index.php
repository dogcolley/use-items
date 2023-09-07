<?php
include_once("./_common.php");
// 실시간 채팅을 위한 WebSocket 서버 주소와 포트 설정

/*
if(!$is_member)
    alert("회원만 이용 가능합니다.",G5_BBS_URL.'/login.php');
*/

include_once(G5_THEME_PATH.'/head.php');

add_javascript('<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>', 100);
add_javascript('<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>', 100);

?>


<div id=app>
    <div class="chat-box" id="chatBox"></div>
    <form id="messageForm">
        <input type="text" id="messageInput" placeholder="Type your message..." required>
        <button type="submit">Send</button>
    </form>
</div>



<!-- HTML 코드 -->
<style>
    .chat-box {
        width: 400px;
        height: 500px;
        overflow: auto;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .message {
        margin-bottom: 10px;
    }
</style>

<script >
    const socket = io('http://localhost:3000');

var vueConfigs = {
  el: '#contents', /* 요소를 바꾸어 봅시다! ( Change DIV id ) */
  data: {
    contents: '여기는 Vue의 영역',
    aside: '여기는 aside',
    header: '여기는 header',
    footer: '여기는 footer'
  }
};
var app = new Vue( vueConfigs );

    // Socket.io 연결

    // DOM 요소들 가져오기
    document.addEventListener('DOMContentLoaded', () => {
        const chatBox = document.getElementById('chatBox');
        const messageForm = document.getElementById('messageForm');
        const messageInput = document.getElementById('messageInput');

        // 메시지 전송 이벤트 핸들러
        messageForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const message = messageInput.value;

            // 입력한 메시지를 서버로 전송
            socket.emit('message', message);

            // 메시지를 채팅 박스에 표시
            appendMessage('You', message);

            // 입력 필드 초기화
            messageInput.value = '';
        });

        // 실시간 메시지 수신 이벤트 핸들러
        socket.on('message', (data) => {
            const { sender, message } = data;
            appendMessage(sender, message);
        });

        // 메시지를 채팅 박스에 추가하는 함수
        function appendMessage(sender, message) {
            const messageElement = document.createElement('div');
            messageElement.classList.add('message');
            messageElement.textContent = `${sender}: ${message}`;
            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    });
</script>




<?php 
include_once(G5_THEME_PATH.'/tail.php');
?>