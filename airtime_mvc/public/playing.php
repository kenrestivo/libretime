<?php


  header("Content-Type: application/json");
         echo $_GET['callback'] . '(' . file_get_contents("playing") . ')';
?>
