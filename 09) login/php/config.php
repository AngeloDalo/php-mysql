<?php

$host = "localhost";
$user = "root";
$password = "root";
$db = "prova";

$connessione = new mysqli($host, $user, $password, $db);

if ($connessione === false){
    die("errore durante la connessione: " . $connessione->connect_error);
}

?>