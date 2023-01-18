<?php
include "config.php";

$content = file_get_contents("php://input");
$update = json_decode($content, true);
if (!$update) {  exit; }

$chatID = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

$keyboard = array('inline_keyboard' =>
  array(
    array(
      array('text'=>'Botao A','callback_data'=> 'cmd1'),
      array('text'=>'Botao B','callback_data'=> 'cmd2')
    )
  ) 
);

if (isset($update['callback_query'])) {
    $data = "+" . $update['callback_query']['data'];
}

$url = URL . API . "/sendMessage?chat_id=" . $chatID . "&text=" . $message . $data . "&reply_markup=".json_encode($keyboard);

file_get_contents($url);

?>
