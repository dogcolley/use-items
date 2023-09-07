const express = require('express');
const { createProxyMiddleware } = require('http-proxy-middleware');
const app = express();
const server = require('http').createServer(app);
const io = require('socket.io')(server, {
  cors: {
    origin: '*' // 모든 출처 허용
  }
});

// Express 애플리케이션 설정
app.use('/chat/backend', createProxyMiddleware({
  target: 'http://localhost:80', // PHP 서버 주소와 포트 설정
  changeOrigin: true,
}));

// Socket.io 이벤트 처리
io.on('connection', (socket) => {
  console.log('New client connected');

  // 클라이언트로부터의 메시지 수신
  socket.on('message', (data) => {
    console.log('Message received:', data);

    // 메시지를 다른 클라이언트들에게 전송
    socket.broadcast.emit('message', {
        sender: 'Someone', // 수정된 부분: 상대방의 이름을 여기에 설정해주세요
        message: data
    });
  });

  // 클라이언트 연결 해제
  socket.on('disconnect', () => {
    console.log('Client disconnected');
  });
});

// 서버 시작
server.listen(3000, () => {
  console.log('Chat server running on port 3000');
});
