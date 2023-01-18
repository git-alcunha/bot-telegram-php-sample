<?php

function conexao($sql) {
  $server = "localhost"; $userna = "usuario";
  $passwd = "senha"; $dbname = "database";

  $conx = new mysqli($server, $userna, $passwd, $dbname);
  return $conx->query($sql);
}
?>
