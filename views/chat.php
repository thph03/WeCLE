<?php include 'views/menu/header.php'; ?>

<style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', sans-serif;
    background-color: #ffffff;
    color: #333;
  }

  .chat-container {
    display: flex;
    flex-direction: column;
    height: 100vh;
    width: 100%;
  }

  .chat-header {
    background-color: #ffffff;
    padding: 16px 24px;
    border-bottom: 1px solid #e5e5e5;
    font-size: 1.25rem;
    font-weight: 600;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.03);
  }

  .chat-body {
    flex: 1;
    padding: 24px;
    overflow-y: auto;
    background-color: #fafafa;
  }

  .chat-msg {
    max-width: 70%;
    margin: 12px 0;
    padding: 14px 18px;
    border-radius: 12px;
    line-height: 1.6;
    white-space: pre-wrap;
  }

  .chat-user {
    background-color: #d1e7dd;
    align-self: flex-end;
    margin-left: auto;
    text-align: right;
  }

  .chat-bot {
    background-color: #f1f1f1;
    align-self: flex-start;
    margin-right: auto;
    text-align: left;
  }

  .chat-footer-wrapper {
    position: sticky;
    bottom: 0;
    background: linear-gradient(to top, white 80%, transparent);
    padding: 24px;
    display: flex;
    justify-content: center;
  }

  #chatForm {
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
    display: flex;
    gap: 12px;
    align-items: flex-end;
    background-color: #f8f8f8;
    border: 1px solid #ccc;
    border-radius: 16px;
    padding: 12px 20px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.06);
  }
  #userInput {
    flex: 1;
    min-height: 48px;
    max-height: 240px;
    resize: none;
    border: none;
    background: transparent;
    font-size: 1rem;
    line-height: 1.6;
    outline: none;
    overflow-y: auto;
    padding: 6px 0;
  }

  button {
    background-color: #f3a998;
    color: white;
    border: none;
    padding: 10px 18px;
    border-radius: 20px;
    font-size: 0.95rem;
    font-weight: 500;
    transition: background-color 0.2s ease-in-out;
  }

  button:hover {
    background-color: #EB8D78;
  }

  .loading-dots::after {
    content: '...';
    animation: blink 1s infinite steps(1, start);
  }

  @keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.2; }
  }
</style>

<div class="chat-container">
  <div class="chat-header">
    Chatbot - English Teacher
  </div>

  <div class="chat-body" id="chatBox">
    <!-- Chat messages appear here -->
  </div>

  <div class="chat-footer-wrapper">
    <form id="chatForm">
      <textarea id="userInput" placeholder="Send a message..." rows="1" required></textarea>
      <button type="submit">Send</button>
    </form>
  </div>
</div>

<script>
  const chatBox = document.getElementById('chatBox');
  const chatForm = document.getElementById('chatForm');
  const userInput = document.getElementById('userInput');

  // Auto-resize textarea
  userInput.addEventListener('input', () => {
    userInput.style.height = 'auto';
    userInput.style.height = userInput.scrollHeight + 'px';
  });

  // Submit bằng Enter, xuống dòng bằng Shift+Enter
  userInput.addEventListener('keydown', function (e) {
    if (e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      chatForm.dispatchEvent(new Event('submit'));
    }
  });

  chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const message = userInput.value.trim();
    if (!message) return;

    appendMessage('user', message);
    userInput.value = '';
    userInput.style.height = 'auto';
    userInput.disabled = true;

    const loadingMsg = appendMessage('bot', '...');
    loadingMsg.classList.add('loading-dots');

    try {
      const res = await fetch('chatbot/send', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message })
      });

      const data = await res.json();
      console.log(data);  // Debugging: Kiểm tra phản hồi từ server

      if (!data.response) {
        throw new Error('Không có phản hồi từ server');
      }

      const formatted = data.response
        .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
        .replace(/\*(.*?)\*/g, '<em>$1</em>')
        .replace(/\n/g, '<br>');

      loadingMsg.classList.remove('loading-dots');
      loadingMsg.innerHTML = formatted;
    } catch (err) {
      loadingMsg.classList.remove('loading-dots');
      loadingMsg.innerHTML = 'Error occurred: ' + err.message;
    }

    userInput.disabled = false;
    userInput.focus();
    chatBox.scrollTop = chatBox.scrollHeight;
  });

  function appendMessage(sender, text) {
    const div = document.createElement('div');
    div.className = 'chat-msg chat-' + (sender === 'user' ? 'user' : 'bot');
    div.innerHTML = `<strong>${sender === 'user' ? 'You' : 'Teacher'}:</strong> ${text}`;
    chatBox.appendChild(div);
    chatBox.scrollTop = chatBox.scrollHeight;
    return div;
  }
</script>
