<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

error_reporting(0);
ini_set('display_errors', 0);

if (file_exists('config.php')) {
    require_once 'config.php';
}

$input = json_decode(file_get_contents("php://input"), true);
$userPrompt = isset($input['prompt']) ? trim($input['prompt']) : '';

if (empty($userPrompt)) {
    echo json_encode(["reply" => "لم أستطع سماع النص بشكل واضح."]);
    exit;
}

$apiKey = defined('GEMINI_API_KEY') ? trim(GEMINI_API_KEY) : '';

if (empty($apiKey)) {
    echo json_encode(["reply" => "خطأ: مفتاح الـ API غير معرف"]);
    exit;
}

// Groq 
$url = "https://api.groq.com/openai/v1/chat/completions";

$data = [
    "model" => "llama-3.3-70b-versatile",
    "messages" => [
        ["role" => "system", "content" => "أنت مساعد صوتي ذكي ومرح، تجيب باللغة العربية بشكل طبيعي ومختصر ومفيد."],
        ["role" => "user", "content" => $userPrompt]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);

$response = curl_exec($ch);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError) {
    echo json_encode(["reply" => "خطأ اتصالات: " . $curlError]);
    exit;
}

$result = json_decode($response, true);

if (isset($result['choices'][0]['message']['content'])) {
    $reply = $result['choices'][0]['message']['content'];
    echo json_encode(["reply" => trim($reply)]);
} else {
    echo json_encode(["reply" => "خطأ من المزود: " . json_encode($result)]);
}
?>