<?php

require_once('config.php');

$id = $_POST['id'];
$nome = $_POST['nome'];

$sql = "UPDATE persone SET nome='$nome' WHERE id = '$id'";

if($connessione->query($sql) === true){
    $data = ["messaggio" => "modifica eseguita", "response" => 1];
    echo json_encode($data);
} else {
    $data = ["messaggio" => "impossibile modificare", "response" => 0];
    echo json_encode($data);
}

?>