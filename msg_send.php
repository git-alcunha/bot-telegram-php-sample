<?php
include "config.php";

$content = file_get_contents("php://input");
$update = json_decode($content, true);
if (!$update) {  exit; }

$chatID = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

$url = URL . API . "/sendMessage?chat_id=" . $chatID . "&text=" . $message;
    
file_get_contents($url);

?>
