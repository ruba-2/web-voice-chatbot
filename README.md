# web-voice-chatbot
# Voice-Activated AI Chatbot

A real-time, interactive Voice Chatbot built to deliver instant spoken and written responses using modern web technologies and high-speed LLM APIs.

---

##  Key Highlights & Project Journey

* **Team Collaboration:** Designed and developed by the **AI Group** as part of our artificial intelligence engineering capabilities.
* **API Integration Discovery:** Hands-on exploration of REST APIs, handling cURL requests in PHP, processing HTTP status codes, and dynamically managing API payload structures.
* **Overcoming Rate Limits & Geoblocking:** Successfully navigated regional rate-limit restrictions (`Quota Exceeded / Limit: 0`) by optimizing backend request routing and integrating Groq's high-throughput LLM API.
* **Seamless Audio Experience:** Combines browser-native Speech-to-Text and Text-to-Speech engines for hands-free interaction.

---

##  Features

* **Voice Recognition (STT):** Captures real-time user voice input directly through the browser microphone using the Web Speech API.
* **Lightning-Fast AI Engine:** Leverages Groq API (Llama 3.3 70B) for ultra-low latency Arabic and English responses.
* **Text-to-Speech Output (TTS):** Converts generated text responses back into natural-sounding speech automatically.
* **Robust Backend Middleware:** PHP-based server side that secures API keys, cleans input text, and formats payload responses safely.
* **Error Handling & Resilience:** Implements clear fallback UI states for handling empty prompts, network failures, or API limits gracefully.

---

##  Tech Stack & Architecture

* **Frontend:** HTML5, CSS3, JavaScript (Web Speech API - `SpeechRecognition` & `SpeechSynthesis`).
* **Backend:** PHP 8.x (cURL Engine, JSON response handling).
* **Local Web Server:** XAMPP / Apache.
* **AI Provider:** Groq API (`llama-3.3-70b-versatile`).

---

##  Project Structure

* `index.html` — User interface featuring the microphone trigger, status badges, and dynamic chat bubbles.
* `app.js` — Client-side voice recognition, UI rendering, speech output controller, and asynchronous API calls.
* `chat.php` — Secure server-side proxy handling API connection, headers, payload execution, and JSON parsing.
* `config.php` — Environment file for safe API key management.

---

##  Getting Started

1. **Prerequisites:** Install [XAMPP](https://www.apachefriends.org/) or any local Apache/PHP server environment.
2. **Setup:** Place the repository folder inside the `htdocs` directory.
3. **Configure Key:** Create a `config.php` file in the root directory:
