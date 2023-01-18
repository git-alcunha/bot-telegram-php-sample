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
// if (!$update) {  exit; }

$chatID = $update["message"]["chat"]["id"];

$sql = "select * from `tabela`";

$qry = conexao($sql);
$row = $qry->fetch_assoc();

$url = URL . API . "/sendMessage?chat_id=" . $chatID . "&text=" . "*".utf8_encode(urldecode($row["id"]."*\n\n" . " " . $row["resultado"]));

file_get_contents($url);

?>
