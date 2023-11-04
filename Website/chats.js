// FAQs - Edit these according to your needs
const faqs = [
    {
      question: "How to give your vote on CryptoVote?",
      answer: "Firstly, Login with your Username, Password, Aadhar no. & VoterID. After doing so, it'll ask for your Face Authentication. Authenticate and then proceed!"
    },
    {
      question: "Why voting on Blockchain is secure?",
      answer: "Voting on the blockchain is secure because it utilizes cryptographic techniques to ensure the integrity and immutability of the voting data. Each vote is recorded as a transaction on the blockchain, which is distributed across multiple nodes, making it difficult for any single entity to manipulate the results."
    },
    {
      question: "Who can access my vote?",
      answer: "The voting data is visible to anyone who has access to the blockchain. However, the identity of the voter is typically kept anonymous by using cryptographic techniques."
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