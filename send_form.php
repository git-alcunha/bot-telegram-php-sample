<?php

include "config.php";
/*
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if (!$update) {  exit; }

$chatID = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

*/
if(isset($_POST['submit'])) {
  $url = URL . API . "/sendMessage?chat_id=" . $_POST['num_id'] . "&text=" . $_POST['message'];
  file_get_contents($url);	
}
?>

<form action="" method="post">
	<input type="text" name="num_id"><br>
	<input type="text" name="mensag"><br>
	<input type="submit" name="Enviar">
</form>
