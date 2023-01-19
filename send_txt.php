<?php

require_once "config.php";

$content = file_get_contents("php://input");
$update = json_decode($content, true);
if (!$update) {  exit; }

$chatID = $update["message"]["chat"]["id"];

$open = fopen("lista.txt", "r") or die("Unable to open file!");
$txt = "";
while(!feof($open)) {
  $txt .= fgets($open);
}
fclose($open);
$url = URL . API . "/sendMessage?chat_id=" . $chatID . "&text=" . $txt;

file_get_contents($url);

?>
