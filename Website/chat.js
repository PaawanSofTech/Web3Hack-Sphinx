// FAQs - Edit these according to your needs
const faqs = [
  {
    question: "How to give your vote on CryptoVote?",
    answer: "Our return policy allows you to return items within 30 days of purchase. Please ensure the items are unused and in their original packaging."
  },
  {
    question: "How can I track my order?",
    answer: "You can track your order by visiting the 'Order Tracking' page on our website and entering your order details."
  },
  {
    question: "What payment methods do you accept?",
    answer: "We accept all major credit cards, PayPal, and bank transfers."
  },
  {
    question: "Do you offer international shipping?",
    answer: "Yes, we offer international shipping to most countries. Please provide your address during checkout for accurate shipping rates."
  }
];

// Chatbot logic
const chatBody = document.getElementById("chatBody");
const userInput = document.getElementById("userInput");

function sendMessage() {
  const message = userInput.value.trim();

  if (message !== "") {
    appendUserMessage(message);
    handleUserMessage(message);
    userInput.value = "";
  }
}

function handleUserMessage(message) {

  const matchingFAQ = faqs.find(faq => faq.question.toLowerCase() === message.toLowerCase());

  if (matchingFAQ) {
    appendBotMessage(matchingFAQ.answer);
  } else {
    appendBotMessage("I'm sorry, I couldn't find a matching answer. Please try asking a different question.");
  }
}

function displayFAQOptions() {
  faqOptions.innerHTML = "";

  faqs.forEach((faq, index) => {
    const optionElement = document.createElement("li");
    optionElement.className = "faq-option";
    optionElement.textContent = faq.question;
    optionElement.addEventListener("click", () => selectFAQOption(index));

    faqOptions.appendChild(optionElement);
  });
}

function selectFAQOption(index) {
  const selectedFAQ = faqs[index];
  appendUserMessage(selectedFAQ.question);
  appendBotMessage(selectedFAQ.answer);
  faqOptions.innerHTML = "";
}

function appendUserMessage(message) {
  const userMessage = createMessageElement(message, "user-message");
  chatBody.appendChild(userMessage);
  scrollToBottom();
}

function appendBotMessage(message) {
  const botMessage = createMessageElement(message, "bot-message");
  chatBody.appendChild(botMessage);
  scrollToBottom();
}

function createMessageElement(message, className) {
  const messageElement = document.createElement("div");
  messageElement.className = `chat-message ${className}`;
  const messageText = document.createElement("div");
  messageText.className = "message-text";
  messageText.textContent = message;
  messageElement.appendChild(messageText);
  return messageElement;
}

function scrollToBottom() {
  chatBody.scrollTop = chatBody.scrollHeight;
}