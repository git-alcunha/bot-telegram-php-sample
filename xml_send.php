<?php

require_once "config.php";

/*************************************************************/
/* Alguns cuidados principais. *******************************/
/* Conheça os comandos utf8_encode / utf8_decode / urldecode */
/* Pois, o retorno &text pode trazer conflitos com o texto ***/
/* padrão. ***************************************************/
/*************************************************************/
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if (!$update) {  exit; }

$chatID = $update["message"]["chat"]["id"];

$feed = simplexml_load_file("https://app.dhb.net.br/xml/");

if(!empty($feed)) {
    foreach ($feed->channel->item as $item) {
        $url = URL . API . "/sendMessage?chat_id=" . $chatID . "&text=" . "*".$item->title."*" . " " . $item->description;
    }
}

file_get_contents($url);

?>
