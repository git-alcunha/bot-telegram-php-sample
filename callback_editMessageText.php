<?php
require("config.php");

$content = file_get_contents("php://input");
$update = json_decode($content, true);
if (!$update) {  exit; }

$key_a = array(
    array(
        array('text'=>'Caminho A','callback_data'=>'a'),
        array('text'=>'Caminho B','callback_data'=>'b')
    )
);
$key_b = array(
    array(
        array('text'=>'Caminho C','callback_data'=>'c'),
        array('text'=>'Caminho D','callback_data'=>'d')
    )
);
$key_c = array(
    array(
        array('text'=>'Caminho E','callback_data'=>'e'),
        array('text'=>'Caminho F','callback_data'=>'f')
    )
);
$keya = json_encode(array('inline_keyboard' => $key_a));
$keyb = json_encode(array('inline_keyboard' => $key_b));
$keyc = json_encode(array('inline_keyboard' => $key_c));

if (isset($update["message"])) {
    $msid = $update['message']['message_id'];
    
    file_get_contents(URL.API
    ."/sendMessage?chat_id=".M_ID
    ."&text=Texto+de+referencia"
    ."&reply_markup=".$keya);
}
if (isset($update['callback_query'])) {
    $reply_markup = $update['callback_query']['message']['reply_markup'];
    $data_a = $update['callback_query']['data'];
    
    
    if($data_a === "a"){ $text = "Referencia " . $data_a; $key = $keyc; } else 
    if($data_a === "b"){ $text = "Referencia " . $data_a; $key = $keyb; } else 
    if($data_a === "c"){ $text = "Referencia " . $data_a; $key = $keya; } else 
    if($data_a === "d"){ $text = "Referencia " . $data_a; $key = $keyc; } else 
    if($data_a === "e"){ $text = "Referencia " . $data_a; $key = $keyb; } else 
    if($data_a === "f"){ $text = "Referencia " . $data_a; $key = $keya; }
    
    
    $sdata = http_build_query([
        'text' => $text,
        'chat_id' => $update['callback_query']['from']['id'],
        'parse_mode' => 'HTML',
        'message_id' => $update['callback_query']['message']['message_id'],
        'reply_markup' => $key
    ]);
    
    file_get_contents(URL.API."/editMessageText?{$sdata}"); 
}
?>
