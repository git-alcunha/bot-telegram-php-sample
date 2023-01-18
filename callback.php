<?php
include "config.php";

$content = file_get_contents("php://input");
$update = json_decode($content, true);
if (!$update) {  exit; }

if (isset($update['callback_query'])) {
    $data = $update['callback_query']['data'];
}

?>
