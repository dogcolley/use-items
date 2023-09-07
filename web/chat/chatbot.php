<?php
include_once("./_common.php");

/*
if(!$is_member)
    alert("회원만 이용 가능합니다.",G5_BBS_URL.'/login.php');
*/

include_once(G5_THEME_PATH.'/head.php');

// OpenAI API 키 설정

?>

<h1>간단한 챗봇</h1>
    <div id="chatbox"></div>
    <input type="text" id="user_input" placeholder="메시지 입력">
    <button onclick="sendMessage()">전송</button>
    
    <script>
        function sendMessage() {
            var userInput = document.getElementById("user_input").value;
            if (userInput.trim() === "") return;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    displayMessage("User: " + userInput);
                    displayMessage("Chatbot: " + response.response);
                }
            };
            xhr.open("POST", g5_url+"/chat/chatbot_ajax.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("user_input=" + userInput);
        }

        function displayMessage(message) {
            var chatbox = document.getElementById("chatbox");
            chatbox.innerHTML += "<p>" + message + "</p>";
        }
    </script>
    <?php 
include_once(G5_THEME_PATH.'/tail.php');
?>