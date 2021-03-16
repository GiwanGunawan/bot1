<?php
$token = "1676765529:AAG1WXeh36ba3vYgUU5ygZHU6HxcsmUPoXk";
$link1 = "https://api.telegram.org/bot" . $token;

$updates = file_get_contents('php://input');
$updates = json_decode($updates, true);

$msgID = $updates['message']['from']['id'];
$name = $updates['message']['from']['firstname'];
$text = $updates['message']['text'];

switch ($text) {
    case "/start":
        sendmsg($msgID, "Welcome $name");
        break;
    case "hello":
        sendmsg($msgID, "Hello $name");
        break;
}

function sendmsg($msgID, $text)
{
    $url = $GLOBALS[link1] . '/sendMessage?chat_id=' . $msgID . '&text=' . urlencode($text);
    file_get_contents($url);
}
