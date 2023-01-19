<?php

require_once "config.php";

$content = file_get_contents("php://input");
$update = json_decode($content, true);
if (!$update) {  exit; }

$chatID = $update["message"]["chat"]["id"];

$url = URL . API . "/sendPhoto?chat_id=" . $chatID . "&photo=https://i.ibb.co/vvLvZqj/telegram.jpg";

file_get_contents($url);

?>
